<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "type",
        "images",
        "city_id",
        "module_id",
        "user_id",
        "state",
        "price",
    ];

    protected $casts = [
        'images' => 'array',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
