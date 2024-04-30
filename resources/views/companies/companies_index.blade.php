@extends('main')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('companies.create') }}">
            <button class="btn btn-primary">Add Companies</button>
        </a>
    </div>
    <table class="table mt-5" id="myTable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Logo</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Website</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            @endphp
            @foreach ($companies as $index => $company)
                <tr>
                    <th scope="row">{{ (int) $index + 1 }}</th>
                    <td>
                        @if ($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" height="100px" width="100px" alt="Company Logo">
                        @else
                            No logo available
                        @endif
                    </td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email != '' ? $company->email : '--' }}</td>
                    <td>{{ $company->website != '' ? $company->website : '--' }}</td>
                    <td>
                        <a href="{{ route('companies.edit', $company->id) }}">
                            <button class="btn btn-info">Edit</button>
                        </a>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST"
                            style="display: inline;">
                            @method('DELETE')
                            @csrf

                            <input type="submit" value="Delete" class="btn btn-danger inline"
                                onclick="return confirm('Are you sure you want to delete shop {{ $company->name }}?')">
                        </form>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-between mt-5">


    </div>

@endsection
