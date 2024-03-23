<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'id',
        'name',
        'image',
        'price',
        'sale_price',
        'description',
        'status',
        'prioty',
        'category_id'
        ];

    public function cat()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class,'product_id','id');
    }

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}