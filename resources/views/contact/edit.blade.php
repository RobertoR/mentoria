@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Edit </h1>
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
	<form action="{{ route('contact.update',['id' => $id]) }}" method="POST">
		{{ method_field('PUT') }}
	    {{ csrf_field() }}    
	    <!--Reutilizacion de templates basicos y envio de argumentos-->
	    @component('components.input_field',[
	    	'id' => 'first_name',
	    	'label' => 'First name',
	    	'name' => 'first_name',    	
	    	'value' => $record->first_name,    	
	    ])<!--El contenido dentro de component se envia directamente a la variable $slot, en caso de definirse una seccion con yield en el componente es posible destinar el contenido del mismo a esa seccion-->
		    @if(0)
			    @section('piece')
			    jala
			    @endsection   
		    @endif
		    <!--Contenido directo a variable slot-->
		    Jaime

	    @endcomponent

		<button>Guardar</button>
	</form>	
</div>
@endsection