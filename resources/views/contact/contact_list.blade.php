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
				<td>{{ $contact->first_name }}</td>
				<td>{{ $contact->last_name }}</td>
				<td>
					<ul>
						@foreach($contact->phones as $phone)
						<li>{{ $phone->number }}</li>
						@endforeach
					</ul>
				</td>
			</tr>
			@endforeach
		</thead>
	</table>
</body>
</html>