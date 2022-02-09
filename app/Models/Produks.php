<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class produks extends Model
{
    use HasFactory, Sluggable;
    
    // protected $fillable - ['judul_produks', 'slug', 'excerpt', 'isi_produks'];
    //melindungi id, field lain bisa di sini menggunakan mass assigment / menambahkan data sekali jalan
    
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
       return [
           'slug' =>[
               'source' => 'judul_produks'
           ]
        ];
    }
}