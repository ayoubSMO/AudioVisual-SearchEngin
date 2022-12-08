@php
    $arr = json_decode($response, true);
@endphp
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="refresh" content="0; url='https://www.google.com/search?q={{$arr['message']}}'" />
  </head>
  <body>
    <p>Please wait ... <a href="https://www.google.com/search?q={{$arr['message']}}">or click</a>.</p>
  </body>
</html>