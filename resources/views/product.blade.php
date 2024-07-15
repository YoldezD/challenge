

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="category_id">Category ID:</label>
        <input type="number" id="category_id" name="category_id" required>
    </div>
    <div>
        <label for="supplier_id">Supplier ID:</label>
        <input type="number" id="supplier_id" name="supplier_id" required>
    </div>
    
    <button type="submit">Add Product</button>
</form>
