@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="h2">Cart</h2>
        <a href="{{ route('home') }}" class="btn btn-outline-primary">{{ __('Back') }}</a>
        <a href="{{ route('cart.clear') }}" class="btn btn-danger">{{ __('Clear') }}</a>
        <table class="table">
        @if (isset($items))
            @foreach ($items as $item)
            <tr>
                <td><img src="{{ asset('images/now_printing.jpg') }}" width="50"></td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td><a href="" class="btn btn-sm btn-danger">{{ __('Delete') }}</a></td>
            </tr>
            @endforeach
        @endif
        </table>
    </div>
@endsection