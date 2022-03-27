<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'completed',
        'completed_at',
        'user_id',
    ];

    protected $table = 'items';


    public function user(){
        return $this->belongTo(User::class,'user_id');
    }
}
