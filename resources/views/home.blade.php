<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>
      Hello World! <br><br>

      <h2>Here are the latest games!</h2>
      @foreach($games as $game)
      {{$game['game']['name'] . " " . $game['game']['aggregated_rating'] ." " . gmdate('d-m-Y', $game['date'])}} <br>
      @endforeach
    </body>
</html>
