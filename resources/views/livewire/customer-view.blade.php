@extends('main')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Customer Information
                <div class="d-flex justify-content-end">

                    <button class="btn btn-primary" wire:click="redirectBackToCustomerData">Back to Customer Data</button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2 font-weight-bold">Name:</div>
                    <div class="col-sm-10">{{ $customer->name }}</div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2 font-weight-bold">Email:</div>
                    <div class="col-sm-10">john{{ $customer->email }}</div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2 font-weight-bold">Phone:</div>
                    <div class="col-sm-10">{{ $customer->phone }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
