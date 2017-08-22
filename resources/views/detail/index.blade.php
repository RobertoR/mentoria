@extends('layouts.app')

@section('content')
    @foreach($products as $product)
        @component('detail.item',['item' => $product])
        @endcomponent
    @endforeach
@endsection