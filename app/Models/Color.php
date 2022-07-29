<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Color extends Model
{
    use HasFactory;

     // asignacion masiva

     protected $fillable = ['name'];

    /* relacion muchos a muchos */

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /* relacion muchos a muchos */

    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }
}
