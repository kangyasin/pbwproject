@extends('front.master.master')
@section('title', 'Detail Blog Project')
@section('menu')
@parent
@endsection

@section('content')
<div class="container-fluid">
  <div class="side-body">
    <h3 style="color:red;">Detail Blog Project</h3>
    <hr><br>

    <div class="row">
            <div class="col-md-12">
                <div class="card-content">
                    <div class="card-img">
                        <img src="{{asset('images') . '/' . $Blog->image_name}}" alt="">
                        <span><h4>{{ $Blog->created_at }}</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>{{ $Blog->title }}</h3>
                        <p>{{ $Blog->description }}</p>
                    </div>
                </div>
            </div>
          </div>
  </div>
</div>
@endsection
