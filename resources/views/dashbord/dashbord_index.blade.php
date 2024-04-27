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


<div class="row">
    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $companies_count ?? 0 }}</h3>
                <p>Total Companies</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $employees_count ?? 0 }}</h3>
                <p>Total Employees</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>


</div>
@endsection
