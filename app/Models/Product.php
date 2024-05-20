<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id',
        'created_at',
        'updated_at',
        'name',
        'description',
        'image',
        'price',
        'stock',
        'categorie_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    protected $primaryKey = 'id';

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
