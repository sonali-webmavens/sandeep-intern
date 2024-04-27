@extends('welcome')

@section('content')

    <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <hr>
            <div class="form-group">
                <label for="exampleInputName">Name  :- </label>
                <input type="text" class="form-control" id="exampleInputName"
                    placeholder="Enter Companies Name" name="name" value="{{ old('name') }}">
            </div>
            <br><br>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address  :-</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter email" name="email" value="{{ old('email') }}">

            </div>
            <br><br>

            <div class="form-group">
                <label for="exampleInputWebsite">Website  ;-</label>
                <input type="Website" class="form-control" id="exampleInputWebsite" placeholder="Website" name="website" value="{{ old('website') }}">
            </div>
            <br><br>

            <div class="form-group">
                <label for="exampleFormControlFile">Companies Logo</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile" name="logo">
            </div>
            <br><br>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
@endsection
