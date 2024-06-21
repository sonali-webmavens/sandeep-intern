@extends('main')


@section('content')

    <form action="{{ route('employees.store' ,['locale' => app()->getLocale()]) }}" method="post" enctype="multipart/form-data">
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
                <label for="exampleInputFirstName">{{ __('employees.First Name') }}  :- </label>
                <input type="text" class="form-control" id="exampleInputFirstName"
                    placeholder="{{ __('employees.Enter First Name') }}" name="first_name" value="{{ old('first_name') }}">
            </div>
            <br>

            <div class="form-group">
                <label for="exampleInputlastName">{{ __('employees.Last Name') }}  :- </label>
                <input type="text" class="form-control" id="exampleInputlastName"
                    placeholder="{{ __('employees.Enter Your last Name') }}" name="last_name" value="{{ old('last_name') }}">
            </div>
            <br>

            <div class="form-group">
                <label for="exampleInputEmail">{{ __('employees.Email address') }}  :- </label>
                <input type="text" class="form-control" id="exampleInputEmail"
                    placeholder="{{ __('employees.Enter your email address') }}" name="email" value="{{ old('email') }}">
            </div>
            <br>

            <div class="form-group">
                <label for="exampleInputphone">{{ __('employees.Phone Number') }} :- </label>
                <input type="number" class="form-control" id="exampleInputphone"
                    placeholder="{{ __('employees.Enter Your phone number') }}" name="phone" value="{{ old('phone') }}">
            </div>
            <br><br>

            <div class="form-group">
                <label for="exampleInputCompanies">{{ __('employees.Companies name') }} :- </label>
                {{-- <input type="number" class="form-control" id="exampleInputphone"
                    placeholder="Enter Companies phone number" name="companies" value="{{ old('companies') }}"> --}}
                <label for="exampleInputCompanies">Companies name :- </label>

                    <select name="companies" id="exampleInputphone">
                        <option value=""> {{ __('employees.select a your companies')}}</option>
                        @foreach($companies as $value)
                        <option value="{{$value->id}} @if($value->id == old('companies_id'))
                            selected
                    @endif">{{$value->name}}</option>
                    @endforeach
                    </select>
            </div>
            <br><br>


            <button type="submit" class="btn btn-primary">{{ __('employees.Submit')}}</button>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
