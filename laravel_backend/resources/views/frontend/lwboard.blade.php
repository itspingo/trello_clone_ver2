
@extends('layouts.lwapp')

@section('content')

 <link rel="stylesheet" href="{{ url('trello_files/core.10c37da1e987f5eae161.css') }}" onerror="_failed(this)" nonce="">
 <link rel="stylesheet" href="{{ url('trello_files/main.css') }}" >

 <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



       @livewire('board')
  
@endsection
