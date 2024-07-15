<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    
    
    protected $fillable = [
        'name', 'description', 'category_id', 'supplier_id', 'colors', 'visibility', 'price', 'main_picture',
    ];

    protected $casts = [
        'colors' => 'array',
    ];

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
