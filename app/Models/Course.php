<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable =[

        'title',
        'status',
        'link',
    ];

    public function photo(){
        return $this->morphOne('App\Photo','photoable');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function quizzes(){
        return $this->hasMany('App\Quiz');
    }

    public function track(){
        return $this->belongsTo('App\Track');
    }

    public function videos(){
        return $this->hasMany('App\Video');
    }
}
