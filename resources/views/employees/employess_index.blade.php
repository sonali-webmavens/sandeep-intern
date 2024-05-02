@extends('main')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('employees.create', ['locale' => app()->getLocale()]) }}">
            <button class="btn btn-primary">{{ __('dashbord.Add Employees') }}</button>
        </a>
    </div>

    <table class="table mt-5" id="myTable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('table.First Name') }}</th>
                <th scope="col">{{ __('table.Last Name') }}</th>
                <th scope="col">{{ __('table.Email') }}</th>
                <th scope="col">{{ __('table.Phone Number') }}</th>
                <th scope="col">{{ __('table.Companies Name') }}</th>
                <th scope="col">{{ __('table.Action') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($employees as $index => $value)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $value->first_name }}</td>
                    <td>{{ $value->last_name }}</td>
                    <td>{{ $value->email ?: '--' }}</td>
                    <td>{{ $value->phone ?: '--' }}</td>
                    <td>{{ $value->companies ? $value->companies->name : '--' }}</td>
                    <td>
                        <a href="{{ route('employees.edit',['locale' => app()->getLocale(), 'employee' => $value->id]) }}" class="btn btn-info">{{ __('table.Edit') }}</a>
                        <form
                            action="{{ route('employees.destroy',['locale' => app()->getLocale(), 'employee' => $value->id]) }}"
                            method="POST" style="display: inline;">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="{{ __('table.Delete') }}" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete shop {{ $value->first_name }}?')">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-between mt-5">


    </div>
@endsection
