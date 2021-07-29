@extends('layouts.base')
@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-striped m-5 ">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">name author</th>
        <th scope="col">title</th>
        <th scope="col">last updated</th>
        <th scope="col">body</th>
        @role('admin')
        <th scope="col">DELETE UPDATE</th>
        @endrole
    </tr>
    </thead>
    @foreach($posts as $post)
        <tbody>
        <tr>
            <td scope="row">{{ $post -> id }}</td>
            <td scope="row">{{ $post -> user -> name }}</td>
            <td scope="row">
                <a href="{{ route('posts.show', $post->title)}}">
                    {{ $post -> title }}
                </a>
            </td>
            <td scope="row" >{{ $post -> updated_at }}</td>
            <td scope="row" >{{ substr($post->body,0,40) }}</td>
            @role('admin')
            <td scope="row">
                <a class="btn btn-success" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form></td>
            @endrole
        </tr>
        </tbody>
    @endforeach
</table>

@endsection
