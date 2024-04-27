@extends('main')

@section('content')

            <div class="d-flex justify-content-end">
                <a href="{{ route('employees.create') }}">
                    <button class="btn btn-primary">Add employees</button>
                </a>
            </div>

            <table class="table table-responsive mt-5" id="myTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Companies Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $index => $value)
                        <tr>
                            <th scope="row">{{ $employees->firstItem() + $index }}</th>
                            <td>{{ $value->first_name }}</td>
                            <td>{{ $value->last_name }}</td>
                            <td>{{ $value->email ?: '--' }}</td>
                            <td>{{ $value->phone ?: '--' }}</td>
                            <td>{{ $value->companies ? $value->companies->name : '--' }}</td>
                            <td>
                                <a href="{{ route('employees.edit', $value->id) }}" class="btn btn-info">Edit</a>
                                <form action="{{ route('employees.destroy', $value->id) }}" method="POST"
                                    style="display: inline;">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Delete" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete shop {{ $value->first_name }}?')">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


@endsection
