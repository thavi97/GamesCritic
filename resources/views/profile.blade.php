@extends('layouts.app')
@section('title', 'Profile')
@section('content')
<div class="col-lg-12 text-center">
  <br><br>
  <h2>Profile</h2>
  <br>
</div>
<div class="container container-fluid">
  <div class="row">
    <div class="col-lg-4">
      <div class="row row-cols-1 row-cols-md-3">
        Hello, {{$data['forename']}}!
      </div>
      <div class="row row-cols-1 row-cols-md-3">
        <a href="/profile/{{$data['id']}}/edit">Edit Profile</a>
      </div>
      <div class="row row-cols-1 row-cols-md-3">
        <a href="/changepassword">Change Password</a>
      </div>
    </div>
    <div class="col-lg-8">
      <h4>Your Wishlist</h4>
      <ul class="list-group">
        @foreach($data['games'] as $wishlist_item)
          <li class="list-group-item">
            {{$wishlist_item[0]['name']}}
            <form method="POST" action="/profile/{{$data['id']}}" class="pull-right">
              @csrf
              @method('DELETE')
              <input type="hidden" id="item_id" name="item_id" value="{{$wishlist_item[0]['id']}}">
              <button type="submit" class="btn btn-primary">Remove</button>
            </form>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endsection
