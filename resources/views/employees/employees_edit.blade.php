@extends('main')

@section('content')

    <form action="{{ route('employees.update',$employees->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
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
                <label for="exampleInputFirstName">First Name  :- </label>
                <input type="text" class="form-control" id="exampleInputFirstName"
                    placeholder="Enter Companies Name" name="first_name" value="{{ $employees->first_name }}">
            </div>
            <br><br>

            <div class="form-group">
                <label for="exampleInputlastName">Last Name  :- </label>
                <input type="text" class="form-control" id="exampleInputlastName"
                    placeholder="Enter Companies last Name" name="last_name" value="{{ $employees->last_name }}">
            </div>
            <br><br>

            <div class="form-group">
                <label for="exampleInputEmail">Email  :- </label>
                <input type="text" class="form-control" id="exampleInputEmail"
                    placeholder="Enter Companies email" name="email" value="{{ $employees->email }}">
            </div>
            <br><br>

            <div class="form-group">
                <label for="exampleInputphone">Phone Number :- </label>
                <input type="number" class="form-control" id="exampleInputphone"
                    placeholder="Enter Companies phone number" name="phone" value="{{ $employees->phone }}">
            </div>
            <br><br>

            <div class="form-group">
                <label for="exampleInputCompanies">Companies name :- </label>

                    <select name="companies" id="exampleInputphone">
                        <option value=""> select a your companies</option>\

                        @foreach($companies as $value)
                                <option value="{{$value->id}}" @if($value->id == $employees->companies_id)
                                            selected
                                    @endif>{{$value->name}}</option>
                            @endforeach
                    </select>
            </div>
            <br><br>

            <button type="submit" class="btn btn-warning">Update</button>
    </form>
    </div>
@endsection
