@php
$title = '商品追加';
@endphp

@extends('layouts.admin')

@section('content')
<section class="container">
  <form action="{{ route('admin.item.add') }}" method="post">
    @csrf
    <div>
      <div class="form-group row">
        <label for="item_name" class="col-md-4 col-form-label">{{ __('Item Name') }}</label>
        <input id="item_name" class="form-control" type="text" name="name" value="{{ old('name', @$item->name) }}"
          required>
      </div>
      <div class="form-group row">
        <label for="item_code" class="col-md-4 col-form-label">{{ __('Item Code') }}</label>
        <input id="item_name" class="form-control" type="text" name="code" value="{{ old('code', @$item->code) }}"
          required>
      </div>
      <div class="form-group row">
        <label for="price" class="col-md-4 col-form-label">{{ __('Price') }}</label>
        <input id="price" class="form-control" type="text" name="price" value="{{ old('price', @$item->price) }}"
          required>
      </div>
    </div>

    <div class="row justify-content-center">
      <button class="btn btn-primary mr-3">{{ __('Add') }}</button>

      <a href="{{ route('admin.item.index') }}" class="btn btn-outline-primary">{{ __('Back') }}</a>
    </div>
  </form>
</section>
@endsection