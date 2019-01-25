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
    <a href="{{url('admin/add_blog')}}" class="btn btn-primary">Add New Product</a><br/><br/>
</div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Product</div>
                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col" colspan="2">Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($products as $key => $product)
                        <tr>
                            <th scope="row">{{ $key += 1 }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ number_format($product->price) }}</td>
                            <td><a href="{{url('admin/product/image/'.$product->id)}}"> image </a></td>
                            <td><a href="{{url('admin/edit_product', $product->id)}}" class="btn btn-success">Edit</a></td>
                            <td>
                            <form action="{{url('adminblog',$product->id)}}" method="post">
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
