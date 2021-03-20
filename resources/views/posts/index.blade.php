@extends('layouts.app')
@section('title') 
index page
@endsection
@section('content')
<a href="{{route('posts.create')}}" class="btn btn-success my-3">Creat Post</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">posted_by</th>
      <th scope="col">created-At</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post['id']}}</th>
      <td>{{$post['title']}}</td>
      <td>{{$post['posted_by']}}</td>
      <td>{{$post['created_at']}}</td>
      <td>
        <a href="{{route('posts.show',['post'=>$post['id']])}}" class="btn btn-info">View</a>
        <a  href="{{route('posts.edit',['post'=>$post['id']])}}" class="btn btn-primary">Edit</a>
        <button class="btn btn-danger">Delete</button>
      </td>
      
      
    </tr>
    @endforeach
  </tbody>
</table>

@endsection