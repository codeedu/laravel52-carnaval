@extends('layouts.app')

@section('content')

    <div class="content container">
        <h2>Checkout</h2>

        <h3>Book information: {{$book->title}}</h3>
        <p>{{$book->description}}</p>
        <p>Price: $ {{$book->price}}</p>

        <div class="stripe-button">
            <form action="{{route('store.process',['id'=>$book->id])}}" method="POST">
                {!! csrf_field() !!}
                <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_eOEveLqmlrfWuT3HF8tjcpRl"
                        data-amount="{{ number_format($book->price, 2, "", "") }}"
                        data-name="CodePub"
                        data-description="Book: {{$book->title}}"
                        data-locale="auto">
                </script>

            </form>
        </div>
    </div>

@endsection