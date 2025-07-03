{{-- resources/views/contacts/index.blade.php --}}

<!DOCTYPE html>
<html>
<head>
    <title>Contacts</title>
</head>
<body>
    <h1>Contacts</h1>

    <ul>
        @foreach ($contacts as $contact)
            <li>{{ $contact->name }} - {{ $contact->email }} - {{ $contact->phone }}</li>
        @endforeach
    </ul>
</body>
</html>
