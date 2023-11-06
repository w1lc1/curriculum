<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public static $rules = [
        'body' => 'required|max:255',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
