@php
$title = '商品一覧';
@endphp

@extends('layouts.admin')

@section('content')
<section>
  <p>
    <a href="{{ route('admin.item.create') }}" class="btn btn-outline-primary">{{ __('New') }}</a>
  </p>
  <div>
    <table class="table">
      <tr>
        <th></th>
        <th>{{ __('Item Name') }}</th>
        <th>{{ __('Item Code') }}</th>
        <th>{{ __('Price') }}</th>
        <th>{{ __('Amount') }}</th>
      </tr>
      @if (isset($items))
      <tr>
        @foreach($items as $item)
        <td><a href="{{ route('admin.item.edit', ['id' => $item->id]) }}" class="btn btn-outline-primary">{{ __('Edit')
            }}</a></td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->code }}</td>
        <td>{{ $item->price }}</td>
        <td>{{ $item->amount }}</td>
        
      </tr>
      @endforeach
    </table>
    @endif
  </div>
</section>
@endsection