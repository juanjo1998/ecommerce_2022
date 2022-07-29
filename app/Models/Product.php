<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //URL AMIGABLES

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // status

    const BORRADOR = 1;
    const PUBLICADO = 2;

    // guarded

    protected $guarded = ['id','created_at','updated_at'];

    /* relacion uno a muchos inversa */

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    /* relacion uno a muchos inversa */

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /* relacion uno a muchos */

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    /* relacion muchos a muchos */

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    // ! uno a muchos polimorfica

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }

}
