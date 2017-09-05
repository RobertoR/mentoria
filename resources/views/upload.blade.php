@extends('layouts.app')

@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

{!! Form::open(array('route' => 'fileUpload','enctype' => 'multipart/form-data', 'class' => 'pl')) !!}

<div class="row cancel">
    <input type="hidden" name="id" value="{{ $id }}">
    <div class="col-md-4">

        {!! Form::file('image', array('class' => 'image')) !!}

    </div>

    <div class="col-md-4">

        <button type="submit" class="btn btn-success">Create</button>

    </div>

</div>
{!! Form::close() !!}

@endsection