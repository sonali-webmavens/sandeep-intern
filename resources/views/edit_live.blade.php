@extends('main')

@section('content')
    @livewire('customer-edit', ['editid' => $editid])
@endsection
