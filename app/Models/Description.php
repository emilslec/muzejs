<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'monument_id'];

    public function type()
    {
        return $this->belongsTo(Monument::class);
    }
}