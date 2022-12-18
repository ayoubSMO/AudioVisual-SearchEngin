<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google</title>
    <link rel="icon" href={{ asset('image/favicon.jpg') }}>
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b0f29e9bfe.js" crossorigin="anonymous"></script>

    <script defer src={{ asset('js/main.js') }}></script>
</head>
<body>

{!! Form::open(['action' => 'App\Http\Controllers\voiceSimularController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="modal fade text-left" id="ModalVoice" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Search With Imgage :)') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>                    
                </div>
                <div class="modal-body">
                    <label for="Speech Recognition">Speech Recognition</label>
                    <input type="text" class = "speechToText" name = "speechToText" id="speechToText" placeholder="Speak Something" onclick="record()">
                    <img src="{{asset('image/voice.png')}}" height="20px" width="20px" onclick="record()" >
                    <!-- Below is the script for voice recognition and conversion to text-->
                    <script>
                        function record() {
                            var recognition = new webkitSpeechRecognition();
                            recognition.lang = "en-GB";
                
                            recognition.onresult = function(event) {
                                // console.log(event);
                                document.getElementById('speechToText').value = event.results[0][0].transcript;
                            }
                            recognition.start();
                
                        }
                    </script>
                <button>submit</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</body>
</html>
