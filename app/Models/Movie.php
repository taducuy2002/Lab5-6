<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
            'title',
            'poster',
            'intro',
            'release_date',
            'genre_id',
    ];

    public function gene() {
        return $this->belongsTo(Genes::class);
    }
}
