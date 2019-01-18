@extends('front.master.master')
@section('title', 'Blog Project')
@section('menu')
@parent
@endsection
@section('content')
<div class="container-fluid">
  <div class="side-body">
    <h3>Profile Customer</h3>
    <hr><br>
    <div class="row">
        <div class="card-body">
            Ini profile member {{ $customer->name }} <br/>
            Email member {{ $customer->email }}
        </div>
      </div>
    </div>
</div>
@endsection
