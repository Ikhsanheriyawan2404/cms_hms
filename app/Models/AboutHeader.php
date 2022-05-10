<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutHeader extends Model
{
    use HasFactory;

    protected $fillable = ['quote', 'keyword', 'description', 'image'];

    public function getTakeImageAttribute()
    {
        return '/storage/' . $this->image;
    }
}
