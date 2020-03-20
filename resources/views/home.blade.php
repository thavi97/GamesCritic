<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>
      Hello World! <br><br>
      @foreach($games as $game)
      {{$game['game']['name'] . " " . gmdate("d-m-Y", $game['date'])}} <br>
      @endforeach
    </body>
</html>
