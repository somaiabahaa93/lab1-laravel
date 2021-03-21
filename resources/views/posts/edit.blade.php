@extends('layouts.app')
@section('content')
<form method="POST" action="{{route('posts.update',['post'=>$post['id']])}}">
@csrf
@method('PUT')

  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input name="title" value="{{$post->title}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input name="description" type="text" value="{{$post->description}}" class="form-control" id="exampleInputPassword1">
  </div>
  <!-- <div class="form-group">
      <label for="post_creator">Post Creator</label>
      <select name="user_id" class="form-control" id="post_creator">
        
          <option value="{{$post->user->id}}">{{$post->user->name}}</option>
      
      </select>
    </div> -->
    <div class="form-group">
      <label for="post_creator">Post Creator</label>
      <select name="user_id" class="form-control" id="post_creator">
        @foreach ($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
      </select>
    </div>
  
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection