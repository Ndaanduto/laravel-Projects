@extends('layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Payments</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <!-- <h5 class="card-title">Name of programe: {{ $payments->name }}</h5> -->
        <!-- <h5 class="card-text">Name of programe: {{ $payments->name }}</h5> -->
        <p class="card-text">Enroll No: {{ $payments->enrollment->enroll_no }}</p>
        <p class="card-text">Paid Date : {{ $payments->paid_date }}</p>
        <p class="card-text">Amount : {{ $payments->amount }}</p>
  </div>
       
    </hr>
  
  </div>
</div>
@endsection