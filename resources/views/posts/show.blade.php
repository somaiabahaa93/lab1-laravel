@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header">
    post info
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$post->title}}</h5>
    <p class="card-text">{{$post->description}}</p>
  </div>
</div>
<div class="card">
  <div class="card-header">
    name info
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$post->user ? $post->user->name : 'user not found'}}</h5>
    <h4 class="card-text">{{$post->created_at->format('Y-m-d')}}</h4>
    <h4 class="card-text">{{$post->user ? $post->user->email : 'email not found'}}</h4>
  </div>
</div>
@endsection