<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    protected $fillable = ['user_id', 'test_type', 'results'];

    // Converter o campo 'results' em array automaticamente
    protected $casts = [
        'results' => 'array',
    ];

    // Relacionamento com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
