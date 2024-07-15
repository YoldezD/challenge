
<h1>Suppliers Matching Brand Category</h1>

<ul>
    @foreach ($suppliers as $supplier)
        <li>{{ $supplier->name }} - {{ $supplier->email }}</li>
    @endforeach
</ul>
