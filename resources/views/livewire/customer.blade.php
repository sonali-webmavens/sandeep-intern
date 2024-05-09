@extends('main')

@section('content')
    <div class="card">
        <br>
        <hr style="color: orange; height: 10px;">
        <h3 class="d-flex justify-content-center" style="color: red">customer form</h3>
        <hr style="color:green; height: 10px;">
        <br>
        <div class="card-body">
            <form wire:submit="save">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Customer Name</label>
                    <input type="text" class="form-control" id="exampleInputName">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPhone" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" id="exampleInputPhone">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
