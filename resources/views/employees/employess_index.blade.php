@extends('welcome')

@section('content')
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <div class="d-flex justify-content-end">
                <a href="{{ route('employees.create') }}">
                    <button class="btn btn-primary">Add employees</button>
                </a>
            </div>

            <table class="table mt-5">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <div>
                            Showing {{ $employees->firstItem() }} to {{ $employees->lastItem() }} of {{ $employees->total() }} entries
                        </div>
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

            <div class="d-flex justify-content-between mt-5">

                <div class="d-flex justify-content-end">
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
