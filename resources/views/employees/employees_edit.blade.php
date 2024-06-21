@extends('main')

@section('content')

    <form action="{{ route('employees.update' ,['locale' => app()->getLocale() , 'employee' =>$employees->id]) }}" method="post" enctype="multipart/form-data">
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
                <label for="exampleInputFirstName">{{ __('employees.First Name') }} :- </label>
                <input type="text" class="form-control" id="exampleInputFirstName"
                    placeholder="{{ __('employees.Enter First Name') }}" name="first_name" value="{{ $employees->first_name }}">
            </div>
            <br><br>

            <div class="form-group">
                <label for="exampleInputlastName">{{ __('employees.Last Name') }}  :- </label>
                <input type="text" class="form-control" id="exampleInputlastName"
                    placeholder="{{ __('employees.Enter Your last Name') }}" name="last_name" value="{{ $employees->last_name }}">
            </div>
            <br><br>

            <div class="form-group">
                <label for="exampleInputEmail">{{ __('employees.Email address') }}  :- </label>
                <input type="text" class="form-control" id="exampleInputEmail"
                    placeholder="{{ __('employees.Enter your email address') }}" name="email" value="{{ $employees->email }}">
            </div>
            <br><br>

            <div class="form-group">
                <label for="exampleInputphone">{{ __('employees.Phone Number') }} :- </label>
                <input type="number" class="form-control" id="exampleInputphone"
                    placeholder="{{ __('employees.Enter Your phone number') }}" name="phone" value="{{ $employees->phone }}">
            </div>
            <br><br>

            <div class="form-group">
                <label for="exampleInputCompanies">{{ __('employees.Companies name') }} :- </label>

                    <select name="companies" id="exampleInputphone">
                        <option value="">{{ __('employees.select a your companies')}}</option>\

                        @foreach($companies as $value)
                                <option value="{{$value->id}}" @if($value->id == $employees->companies_id)
                                            selected
                                    @endif>{{$value->name}}</option>
                            @endforeach
                    </select>
            </div>
            <br><br>

            <button type="submit" class="btn btn-warning">{{ __('employees.Update')}}</button>
    </form>
@endsection
