<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'users_id', 'name', 'email', 'phone', 'address', 'note'
    ];

    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'orders_id', 'id');
    }

    public function scopeSearch($query)
    {
        if ($from = request()->fromdate) {
            $to = request()->todate;
            $query = $query->whereBetween('created_at', [$from, $to]);
        }
        return $query;
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
