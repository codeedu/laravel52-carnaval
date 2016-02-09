@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>My Orders</h2>

        <table class="table table-bordered">
            <thead>
            <th>Order</th>
            <th>Book</th>
            <th>Price</th>
            <th>Action</th>
            </thead>
            <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->book->title}}</td>
                <td>{{$order->price}}</td>
                <td>

                <a href="{{route('store.download',['id'=>$order->id])}}" class="btn btn-primary">
                    Download
                </a>

                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection