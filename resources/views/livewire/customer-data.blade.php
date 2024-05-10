@extends('main')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ url('/live') }}">
            <button class="btn btn-primary">Add Customer</button>
        </a>
    </div>
    <br>

    <table class="table mt-3" id="myTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">phone number</th>
                <th scope="col" style="background-color: lime; color:red;">Action</th>

            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp

            @foreach ($customers as $value)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>
                        <button wire:click="$emit('viewCustomer', {{ $value->id }})" class="btn btn-primary">View</button>

                        <button href="" class="btn btn-info">Edit</button>
                        <button href="" class="btn btn-danger">delet</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
