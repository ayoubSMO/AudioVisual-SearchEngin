import os

from flask import Flask, request, jsonify
from PIL import Image
import cv2
import numpy as np
from keras.models import load_model
from difflib import SequenceMatcher


app =Flask(__name__)

app.secret_key = "caircocoders-ednalan"

UPLOAD_FOLDER = 'static/uploads'
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER
app.config['MAX_CONTENT_LENGTH'] = 16 * 1024 * 1024

ALLOWED_EXTENSIONS = set(['png', 'jpg', 'jpeg','tmp'])
classes = ["airplane", "automobile", "bird", "cat", "deer", "dog", "frog", "horse", "ship", "truck"]

def allowed_file(filename):
  return '.' in filename and filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS

## function for calculating the simularit
def similar(a, b):
  return SequenceMatcher(None, a, b).ratio()

@app.route('/')
def main():
  return 'Homepage'


@app.route('/upload', methods=['POST'])
def predictImage():
  # check if the post request has the file part
  files = request.files.getlist('files[]')
  files = files[0]
  errors = {}
  success = False
  classes = ["airplane", "automobile", "bird", "cat", "deer", "dog", "frog", "horse", "ship", "truck"]

  if files and allowed_file(files.filename):
    #file.save(os.path.join(app.config['UPLOAD_FOLDER'], filename))
    success = True
  else:
    errors[files.filename] = 'File type is not allowed'

  if success and errors:
    errors['message'] = 'File(s) successfully uploaded'
    resp = jsonify(files)
    resp.status_code = 500
    return resp
  if success:

    img = Image.open(files)
    opencvImage = cv2.cvtColor(np.array(img), cv2.COLOR_RGB2BGR)

    ## Image preprocecing to predict the class !!
    resized = cv2.resize(opencvImage, (32,32), interpolation=cv2.INTER_AREA)

    # Normlize
    resized = resized / 255.0

    model = load_model('cnnModel2M')
    predictedClass = model.predict(resized.reshape(1,32,32,3))
    y_classes = [np.argmax(element) for element in predictedClass]

    print(classes[y_classes[0]])


    print(opencvImage.shape,  resized.shape)

    resp = jsonify({'message' : classes[y_classes[0]]})
    resp.status_code = 201
    return resp
  else:
    resp = jsonify(errors)
    resp.status_code = 500
    return resp

@app.route('/simul', methods=['POST'])
def simularity():
  resultat = request.get_data().decode("utf-8").rsplit('=',1)[-1]

  simularList = []
  for classe in classes:
    simularList.append(similar(resultat, classe))

  print(classes[np.argmax(simularList)])
  resp = jsonify({'message': classes[np.argmax(simularList)]})
  resp.status_code = 201
  return resp

if __name__ == '__main__':
  app.run(debug=True)

