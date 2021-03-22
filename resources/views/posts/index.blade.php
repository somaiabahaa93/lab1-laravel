@extends('layouts.app')
@section('title') 
index page
@endsection
@section('content')
<a href="{{route('posts.create')}}" class="btn btn-success my-3">Creat Post</a>
<table class="table table-striped ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">Slug</th>‏
      <th scope="col">posted_by</th>
      <th scope="col">created-At</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{ $post->slug}}</td>

      <td>{{$post->user ? $post->user->name : 'user not found'}}</td>
      <td>{{$post->created_at->format('Y-m-d')}}</td>
      <td>
        <a href="{{route('posts.show',['post'=>$post['id']])}}" class="btn btn-info">View</a>
        <a  href="{{route('posts.edit',['post'=>$post['id']])}}" class="btn btn-primary">Edit</a>
        
        <form style="display:inline" method="POST" action="{{route('posts.destroy',['post'=>$post['id']])}}">
        @csrf
        @method('DELETE')
        <button onclick="return confirm('Are you sure?')" class="btn btn-danger" type="submit">Delete</button>
        </form>
      </td>
      
      
    </tr>
    @endforeach
  </tbody>
  {{$posts->links("pagination::bootstrap-4")}}
</table>

@endsection