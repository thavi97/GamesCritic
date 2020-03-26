@extends('layouts.template')
@section('title', 'GamesCritic')
@section('body')
<div class="col-lg-12 text-center">
  <br><br>
  <h2>Here are the latest games!</h2>
  <br>
</div>
<div class="container container-fluid">
  <div class="row row-cols-1 row-cols-md-3">
    @foreach($games as $game)
    <div class="col mb-4">
      <!-- Card -->

      <div class="card h-100">
        <!--Card content-->
        <div class="card-body">
          <!--Title-->
          <h4 class="card-title">{{$game['game']['name']}}</h4>
          <!--Text-->
          <p class="card-text text-truncate">{{$game['game']['summary']}}</p>
          <a href="/new_games/{{$game['game']['id']}}" class="btn stretched-link"></a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
