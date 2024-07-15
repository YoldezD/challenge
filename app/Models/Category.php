<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';


    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'category_supplier', 'category_id', 'supplier_id');
    }
    public function brands()
    {
        return $this->hasMany(Brand::class);
    }
}
