@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Detalle</div>
                    <div class="panel-body">
                        @if($product)
                        <div class="col-md-6">
                            <h3>{{ $product->titulo }}</h3>
                            @foreach($product->images()->get() as $image)
                            <img src="{{ '/images/'.$image->filename }}" height="200">
                            @endforeach
                            <p>{{ $product->descripcion }}</p>
                            <a href="{{ route('products.index') }}">Regresar</a>
                            <a href="{{ route('products.edit',['id'=>$product->id]) }}">Editar</a>
                        </div>
                        @else
                            <p>Error</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection