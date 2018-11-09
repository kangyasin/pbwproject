@extends('front.master.master')
@section('title', 'Blog Project')
@section('menu')
@parent
@endsection
@section('content')
<div class="container-fluid">
  <div class="side-body">
    <h3>Blog PBW Project</h3>
    <hr><br>
    <div class="row">

            @foreach($Blogs as $blog)
            <div class="col-md-4" style="margin-bottom:20px;">
                <div class="card-content">
                    <div class="card-img">
                        <img src="https://placeimg.com/380/230/nature" alt="">
                        <span><h4>{{ $blog->created_at }}</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>{{ $blog->title }}</h3>
                        <p>{{ $blog->description }}</p>
                            <a href="/detail/{{ $blog->id }}" class="btn-card">Read</a>
                    </div>
                </div>
            </div>
            @endforeach

            </div>
        </div>

  </div>
</div>
@endsection
