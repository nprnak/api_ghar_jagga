<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title','slug','location','excerpt','description','image','status','meta'];
}
