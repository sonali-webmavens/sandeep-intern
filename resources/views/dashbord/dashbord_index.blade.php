@extends('main')

@section('content')


    @php
    $companies_count ;
    $employees_count ;

    foreach ($companies as $key => $value) {
        $companies_count = $key+1;
    }
    foreach ($employees as $key => $value) {
        $employees_count = $key+1;
    }
    @endphp
    <div class="container px-6 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
    <div class="col-md-6 grid-margin transparent">
      <div class="row">
        <div class="col-md-12 mb-4 stretch-card transparent">
          <div class="card card-tale">
            <div class="card-body">
              <p class="mb-4">{{ __('dashbord.Total_Companies') }}</p>
              <p class="fs-30 mb-2">{{ $companies_count ?? '' }} </p>
              {{-- <p>10.00% (30 days)</p> --}}
            </div>
          </div>
        </div>
        <div class="col-md-12 mb-4 stretch-card transparent">
          <div class="card card-dark-blue">
            <div class="card-body">
              <p class="mb-4">{{ __('dashbord.Total Employees') }}</p>
              <p class="fs-30 mb-2">{{ $employees_count ?? '' }}</p>
              {{-- <p>22.00% (30 days)</p> --}}
            </div>
          </div>
        </div>
      </div>

      </div>
    </div>
</div>
</div>

@endsection
