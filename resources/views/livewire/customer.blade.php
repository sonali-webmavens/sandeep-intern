@extends('main')

@section('content')
<div>
    <div class="card">
        <br>
        <hr style="color: orange; height: 10px;">
        <h3 class="d-flex justify-content-center" style="color: red">Customer Form</h3>
        <hr style="color:green; height: 10px;">
        <br>

        <div class="card-body">
            <form wire:submit.prevent="save">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Customer Name</label>
                    <input wire:model="name" type="text" class="form-control" id="exampleInputName">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input wire:model="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPhone" class="form-label">Phone Number</label>
                    <input wire:model="phone" type="number" class="form-control" id="exampleInputPhone">
                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
