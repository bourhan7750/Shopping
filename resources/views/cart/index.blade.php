@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="h2">Cart</h2>
        <a href="{{ route('cart.clear') }}" class="btn btn-danger">{{ __('Clear All') }}</a>
        <table class="table">
            <tr>
                <th></th>
                <th>{{__('Item Name')}}</th>
                <th>{{__('Price')}}</th>
                <th>{{__('Amount')}}</th>
            </tr>
        @if (isset($items))
            @foreach ($items as $item)
            <tr>
                <td><img src="{{ asset('images/now_printing.jpg') }}" width="50"></td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>
                    <input type="number" value="{{ $user_items[$item->id]->amount }}"
                            class="form-control col-3 text-right">
                </td>
                <td><a href="{{ route('cart.remove', ['index' => $item->id]) }}" class="btn btn-sm btn-danger">{{ __('Delete') }}</a></td>
            </tr>
            @endforeach
        @endif
        </table>
    </div>
@endsection