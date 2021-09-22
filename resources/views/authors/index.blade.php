@extends('layouts.header')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('authors.create')}}" class="btn btn-primary">Create author</a>
            </div>
            <div class="col-md-12">
                @if (session()->has('success'))
                        <div class="alert alert-success fade show mt-3" role="alert">
                            <h3>{{ session('success') }}</h3>
                        </div>
                @endif
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Books</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($authors as $author)
                            <tr>
                                <th scope="row">{{$author->id}}</th>
                                <td>{{$author->first_name}}</td>
                                <td>{{$author->last_name}}</td>
                                <td>
                                    <ul class="list-unstyled">
                                        @foreach($author->books as $book)
                                            <li>{{$book->name}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{route('authors.edit',$author->id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('authors.destroy',$author->id)}}" class="d-inline-block" method="post">
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
