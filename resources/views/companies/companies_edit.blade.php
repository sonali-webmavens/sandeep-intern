@extends('main')

@section('content')
    <form action="{{ route('companies.update' ,  ['locale' => app()->getLocale(), 'company' => $companies->id]) }}" method="post" enctype="multipart/form-data">
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
        <div class="container">
            <div class="form-group">
                <label for="exampleInputName">{{ __('companies.Name') }}  :- </label>
                <input type="text" class="form-control" id="exampleInputName"
                    placeholder="{{ __('companies.Enter Companies Name') }}" name="name" value="{{ $companies->name }}">
            </div>
            <br><br>

            <div class="form-group">
                <label for="exampleInputEmail1">{{ __('companies.Email address') }}  :-</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="{{ __('companies.Enter your email address') }}" name="email" value=" {{ $companies->email }}">
            </div>
            <br><br>

            <div class="form-group">
                <label for="exampleInputWebsite">{{ __('companies.Website') }}   ;-</label>
                <input type="Website" class="form-control" id="exampleInputWebsite" placeholder="{{ __('companies.enter your companies Website') }}" name="website" value="{{ $companies->website }}">
            </div>
            <br><br>

            <div class="form-group">
                <label for="exampleFormControlFile">{{ __('companies.Companies Logo') }}</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile" name="logo" >
            </div>
            <br><br>

            <button type="submit" class="btn btn-warning">{{ __('companies.Update') }}</button>
    </form>
@endsection
