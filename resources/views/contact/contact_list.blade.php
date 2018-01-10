<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1">
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name Name</th>
			</tr>
		</thead>
		<tbody>
			@foreach($contacts as $contact)
			<tr>
				<td><a href="{{ route('contact.edit', ['id' => $contact->id ])}}">{{ $contact->first_name }}</a></td>
				<td>{{ $contact->last_name }}</td>
				<td>
					<ul>
						@foreach($contact->phones as $phone)
						<li><a href="{{ route('phone.edit', ['id' => $phone->id ])}}">{{ $phone->number }}</a></li>
						@endforeach
					</ul>
				</td>
			</tr>
			@endforeach
		</thead>
	</table>
</body>
</html>