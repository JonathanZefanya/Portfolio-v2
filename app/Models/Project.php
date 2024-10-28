<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'slug', 'image', 'link'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'project_categories');
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }
}
