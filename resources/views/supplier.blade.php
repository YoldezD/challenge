<!DOCTYPE html>
<html>
<head>
    <title>Suggested Suppliers</title>
</head>
<body>
    <h1>Suggested Suppliers</h1>

    <ul>
        @foreach ($suppliers as $supplier)
            <li>{{ $supplier->name }} - {{ $supplier->email }}</li>
        @endforeach
    </ul>
</body>
</html>
