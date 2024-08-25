@extends('layouts.lwapp')

@section('content')
    <h5>{{'counter: '.$counter}}</h5>
    @livewire('counter')
@endsection
