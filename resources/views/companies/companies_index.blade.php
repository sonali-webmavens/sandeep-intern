{{-- @dd('saassasasas'); --}}
@extends('main')

@section('content')
{{-- @dd('san'); --}}
    <div class="d-flex justify-content-end">
        <a href="{{ route('companies.create' ,['locale' => app()->getLocale()]) }}">
            <button class="btn btn-primary">{{ __('dashbord.Add Companies') }}</button>
        </a>
    </div>
    <table class="table mt-5" id="myTable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('table.Logo') }}</th>
                <th scope="col">{{ __('table.Name') }}</th>
                <th scope="col">{{ __('table.Email') }}</th>
                <th scope="col">{{ __('table.Website') }}</th>
                <th scope="col">{{ __('table.Action') }}</th>
            </tr>

        </thead>
        <tbody>

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
                        <a href="{{ route('companies.edit', ['locale' => app()->getLocale(), 'company' => $company->id]) }}" class="btn btn-info">{{ __('table.Edit') }}</a>

                        <form action="{{ route('companies.destroy', ['locale' => app()->getLocale(), 'company' => $company->id]) }}" method="POST"
                            style="display: inline;">
                            @method('DELETE')
                            @csrf

                            <input type="submit" value="{{ __('table.Delete') }}" class="btn btn-danger inline"
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
