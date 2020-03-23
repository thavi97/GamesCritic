@extends('layouts.template')
@section('title', 'GamesCritic')
@section('body')
<div class="col-lg-12 text-center">
  Hello World! <br><br>
  <h2>Here are the latest games!</h2>
  @foreach($games as $game)
  {{$game['game']['name'] . " " . $game['game']['aggregated_rating'] ." " . gmdate('d-m-Y', $game['date'])}} <br>
  @endforeach
</div>

<div class="container container-fluid">
  <div class="row row-cols-1 row-cols-md-3">
    @foreach($games as $game)
    <div class="col mb-4">
      <!-- Card -->

      <div class="card h-100">
        <!--Card image-->
        <div class="view overlay">
          {{ HTML::image($game['game']['artworks'][0], 'Card image cap', array('class' => 'card-img-top')) }}
          <a href="#!">
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>

        <!--Card content-->
        <div class="card-body">
          <!--Title-->
          <h4 class="card-title">{{$game['game']['name']}}</h4>
          <!--Text-->
          <p class="card-text">{{$game['game']['summary']}}</p>
        </div>
      </div>

    </div>
    @endforeach
  </div>
</div>
@endsection
