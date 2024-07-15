<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    
    
    protected $fillable = [
        'name', 'email', 'password', 'address', 'category_id', 'logo',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
    public function searchHistories()
    {
        return $this->hasMany(SearchHistory::class);
    }
}
