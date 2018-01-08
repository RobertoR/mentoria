<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="{{ route('phone.update',['id' => $id ]) }}" method="post">
		{{ method_field('PUT') }}
    	{{ csrf_field() }}
		<label>Number</label>
		<input type="text" name="number" value="{{ $record->number }}">
		<button>Save</button>
	</form>
</body>
</html>