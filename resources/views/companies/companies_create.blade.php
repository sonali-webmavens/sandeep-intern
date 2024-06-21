@extends('main')

@section('content')

    <form action="{{ route('companies.store', ['locale' => app()->getLocale()]) }}" method="post" enctype="multipart/form-data">
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
                <label for="exampleInputName">{{ __('companies.Name') }} :- </label>
                <input type="text" class="form-control" id="exampleInputName"
                    placeholder="{{ __('companies.Enter Companies Name') }}" name="name" value="{{ old('name') }}">
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputEmail1">{{ __('companies.Email address') }}  :-</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="{{ __('companies.Enter your email address') }}" name="email" value="{{ old('email') }}">

            </div>
            <br>

            <div class="form-group">
                <label for="exampleInputWebsite">{{ __('companies.Website') }}  ;-</label>
                <input type="Website" class="form-control" id="exampleInputWebsite" placeholder=" {{ __('companies.enter your companies Website') }}" name="website" value="{{ old('website') }}">
            </div>
            <br>

            <div class="form-group">
                <label for="exampleFormControlFile">{{ __('companies.Companies Logo') }}</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile" name="logo">
            </div>
            <br><br>
            <button type="submit" class="btn btn-primary">{{ __('companies.Submit') }}</button>
    </form>
@endsection
