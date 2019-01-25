@extends('layouts.app')

@section('content')
<div class="container">
@if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <div class="row justify-content-center">
        <div class="right">
    <a href="{{url('admin/add_blog')}}" class="btn btn-primary">Add New Image</a><br/><br/>
</div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Image</div>
                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col" colspan="2">Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($images as $key => $image)
                        <tr>
                            <th scope="row">{{ $key += 1 }}</th>
                            <td><img src="{{asset('product') . '/' . $image->name}}" width="300" alt=""></td>
                            <td><a href="{{url('admin/edit_blog', $image->id)}}" class="btn btn-success">Edit</a></td>
                            <td>
                            <form action="{{url('adminblog',$image->id)}}" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button onclick="return confirm('Are you sure?')" class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
