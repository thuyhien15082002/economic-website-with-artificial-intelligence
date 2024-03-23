<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $fillable = ['users_id','product_id','reply_id','content'];

    public function users()
    {
        return $this->hasOne(User::class,'id','users_id');
    }
}
