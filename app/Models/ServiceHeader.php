<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceHeader extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'quote', 'keyword', 'description', 'image'];

    public function getTakeImageAttribute()
    {
        return '/storage/' . $this->image;
    }
}
