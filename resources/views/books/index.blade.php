@extends('layouts.header')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('books.create')}}" class="btn btn-primary">Create book</a>
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
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Authors</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <th scope="row">{{$book->id}}</th>
                                <td>{{$book->name}}</td>
                                <td>{{$book->description}}</td>
                                <td>
                                    <ul class="list-unstyled">
                                        @foreach($book->authors as $author)
                                            <li>{{$author->first_name}} {{$author->last_name}}</li>
                                        @endforeach
                                    </ul>

                                </td>
                                <td>
                                    <a href="{{route('books.edit',$book->id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('books.destroy',$book->id)}}" class="d-inline-block" method="post">
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
