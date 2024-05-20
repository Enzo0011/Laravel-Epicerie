<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqAnswer extends Model
{
    use HasFactory;

    protected $table = 'faq_answers';

    protected $fillable = [
        'id',
        'created_at',
        'updated_at',
        'user_id',
        'faq_id',
        'answer',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function faq()
    {
        return $this->belongsTo(Faq::class);
    }
}
