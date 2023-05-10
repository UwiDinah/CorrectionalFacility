<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Visitation;

class admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    public function getscheduleVisittName(){
        return $this->belongsTo(Visitation::class,'id');
    }
}
