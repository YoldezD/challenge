<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
   
    protected $fillable = [
        'name', 'email', 'password', 'address', 'phone', 'logo',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_supplier', 'supplier_id', 'category_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
