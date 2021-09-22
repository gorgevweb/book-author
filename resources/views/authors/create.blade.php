@extends('layouts.header')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="row g-3" method="post" action="{{route('authors.store')}}">
                    @csrf
                    <div class="col-6">
                        <label for="name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="name" name="first_name" placeholder="" required>
                    </div>
                    <div class="col-6">
                        <label for="last-name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last-name" name="last_name" placeholder="" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
