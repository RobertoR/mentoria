@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Detalle</div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <form action="{{ route('products.update',['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                {!! Form::file('image', array('class' => 'image')) !!}
                                <label for="">Título</label><br>
                                <input type="text" name="titulo" value="{{ $product->titulo }}"><br>
                                @if($errors->has('titulo'))
                                    {{ $errors->first('titulo') }}<br>
                                @endif
                                 @foreach($product->images()->get() as $image)
                                    <a href="{{ route('update.image',['id'=>$image->id]) }}">
                                    <img src="{{ '/images/'.$image->filename }}" height="200">
                                    </a>
                                @endforeach
                                <label for="">Descripción</label><br>
                                <textarea name="descripcion">{{ old('descripcion',$product->descripcion) }}</textarea><br>
                                @if($errors->has('descripcion'))
                                    {{ $errors->first('descripcion') }}<br>
                                @endif
                                <label for="">Tipo</label><br>
                                <select name="product_type_id" ><br>
                                    @foreach($types as $type)
                                    <option value="{{ $type->id }}" {{ ($type->id == $product->product_type_id)?"selected":"" }}>{{ $type->name }}</option>
                                    @endforeach
                                </select><br><br>
                                <button>Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection