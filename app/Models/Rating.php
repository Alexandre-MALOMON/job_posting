<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable=[
        'examiner',
        'rate',
        'examinateur'
    ];

    public function users(){
        return $this->hasMany(User::class,'examiner','id');
    }
}
