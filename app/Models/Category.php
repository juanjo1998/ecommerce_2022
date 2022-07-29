<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

     //URL AMIGABLES

     public function getRouteKeyName()
     {
         return 'slug';
     }

    /* asignacion masiva */

    protected $fillable = ['name','slug','image','icon'];

    /* relacion uno a muchos */

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    /* relacion muchos a muchos */

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    // ! uno a muchos a traves de

    public function products()
    {
        return $this->hasManyThrough(Product::class,Subcategory::class);//(a que tabla llegar, por cual tabla pasa)
    }
}
