@extends('layouts.app')

@section('more-css')
<link href="{{asset('css/contact/style.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
<main class="">
    
</main>
@include('layouts.footer')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
@endsection
