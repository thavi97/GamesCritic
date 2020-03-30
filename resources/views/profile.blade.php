@extends('layouts.app')
@section('title', 'Profile')
@section('content')
<div class="col-lg-12 text-center">
  <br><br>
  <h2>Profile</h2>
  <br>
</div>
<div class="container container-fluid">
  <div class="row row-cols-1 row-cols-md-3">
    Hello, {{$data['forename']}}!
  </div>
</div>
@endsection
