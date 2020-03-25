@extends('layouts.template')
@section('title', 'GamesCritic - ' . $data['game']['name'])
@section('body')
<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-4">

      <h4><a href="{{$data['website']['url']}}">Visit Game</a></h4>
      <hr class="d-sm-none">
    </div>
    <div class="col-sm-8">
      <h2>{{$data['game']['name']}}</h2>
      <h3>Developed By: {{$data['company']['name']}}</h3>
      <h4>{{$data['platform']['abbreviation']}} </h4>
      <h5>Release Date: {{$data['release_date']['human']}}</h5>
      <p>{{$data['game']['summary']}}</p>
      <p></p>
      <br>
      </div>
  </div>
</div>

@endsection
