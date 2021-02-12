@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if (isset($items))
                @foreach ($items as $item)
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <div class="card-header bg-white">
                                <img src="{{ asset('images/now_printing.jpg') }}" alt="" width="100%">
                            </div>
                            <div class="card-body">
                                <div class="detail">
                                    <p>{{ $item->name }}</p>
                                    <p>&yen; {{ $item->price }}</p>
                                    <p class="row justify-content-center">
                                        <a href="{{ route('cart.add', ['id' => $item->id]) }}" class="btn btn-primary">{{ __('Add Cart') }}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection