@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="right">
    <a href="" class="btn btn-primary">Add New Blog</a>
</div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Blog</div>
                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Created</th>
                        <th scope="col" colspan="2">Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($DataBlogs as $key => $DataBlog)
                        <tr>
                            <th scope="row">{{ $key += 1 }}</th>
                            <td>{{ $DataBlog->title }}</td>
                            <td>{{ $DataBlog->created_at }}</td>
                            <td><a href="" class="btn btn-success">Edit</a></td>
                            <td><a href="" class="btn btn-danger">Delete</a></td>
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
