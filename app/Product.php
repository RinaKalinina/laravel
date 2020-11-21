<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getDate()
    {
       return $this->created_at->format('d.m.Y');
    }

    public function getImg()
    {
        return asset('img/products/' . $this->img);
    }
}
