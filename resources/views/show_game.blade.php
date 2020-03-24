@extends('layouts.template')
@section('title', 'GamesCritic - ' . $game['name'])
@section('body')
<p>{{$game['name']}}</p>
@endsection
