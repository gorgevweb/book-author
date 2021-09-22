@extends('layouts.header')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="row g-3" method="post" action="{{route('books.store')}}">
                @csrf
                <div class="col-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="" required>
                </div>
                <div class="col-6">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="">
                </div>

                <div class="col-md-12">
                    <label for="author" class="form-label">Author(s)</label>
                    <select id="author" name="authors[]" class="form-select" required multiple>
                        @foreach($authors as $author)
                            <option value="{{$author->id}}">{{$author->first_name}} {{$author->last_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#author').select2({
                tags: true
            })
        })
    </script>
@endsection
