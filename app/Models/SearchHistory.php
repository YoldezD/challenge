<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    use HasFactory;

    protected $fillable = ['brand_id', 'search_query'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}

