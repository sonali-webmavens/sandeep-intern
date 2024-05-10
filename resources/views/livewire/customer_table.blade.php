@extends('main')

@section('content')
<div class="d-flex justify-content-end">
    <a href="{{ route('customer.create') }}">
        <button class="btn btn-primary">Add Customer</button>
    </a>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">phone number</th>
      </tr>
    </thead>
    <tbody>
        @php

            $i = 0;
        @endphp

        @foreach ($customer as $value)
      <tr>
        <th scope="row">{{ $i++ }}</th>
        <td>{{ $value->name }}</td>
        <td>{{ $value->email }}</td>
        <td>{{ $value->phone }}</td>
    </tr>
    @endforeach
    </tbody>
  </table>
  @endsection
