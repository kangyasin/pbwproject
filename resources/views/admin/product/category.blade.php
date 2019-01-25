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
    <a href="{{url('admin/add_blog')}}" class="btn btn-primary">Add New Category</a><br/><br/>
</div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Category</div>
                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col" colspan="2">Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($categories as $key => $category)
                        <tr>
                            <th scope="row">{{ $key += 1 }}</th>
                            <td><a href="{{url('admin/product/'.$category->id)}}"> {{ $category->name }}</a></td>
                            <td>{{ $category->description }}</td>
                            <td><a href="{{url('admin/edit_blog', $category->id)}}" class="btn btn-success">Edit</a></td>
                            <td>
                            <form action="{{url('adminblog',$category->id)}}" method="post">
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
