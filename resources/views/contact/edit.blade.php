<h1>Edit </h1>
<form action="{{ route('contact.update',['id' => $id]) }}" method="POST">
	{{ method_field('PUT') }}
    {{ csrf_field() }}
	<input type="text" name="name">
	<button>Guardar</button>
</form>