<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<ul>
	@foreach($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</ul>
	<form action="{{ route('phone.update',['id' => $id ]) }}" method="post">
		{{ method_field('PUT') }}
    	{{ csrf_field() }}
		<label>Number</label>
		<input type="hidden" name="id" value="{{ $record->id}}">
		<input type="hidden" name="contact_id" value="{{ $record->contact_id}}">
		<input type="text" name="number" value="{{ $record->number }}">
		<button>Save</button>
	</form>
</body>
</html>