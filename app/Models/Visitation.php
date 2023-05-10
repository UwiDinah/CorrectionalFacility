<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitation extends Model
{
    use HasFactory;

        protected $fillable=[
             'name',
            'email',
            'visitation_day',
        ];

        public function user(){
            return $this->belongsTo(User::class);
        }


}
