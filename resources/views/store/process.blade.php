@extends('layouts.app')

@section('content')

    <div class="content container">
        @if($status)
            <h2>Your order has been placed</h2>
            <p>
                <a href="{{route('store.orders')}}">Click here to download your book.</a>
            </p>
        @else
            <h2>Opss!</h2>
            <p>Your credit card has been declined. Try it again.</p>
        @endif
    </div>

@endsection