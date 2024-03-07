<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Tutte le colonne abilitate al mass-assignment
    protected $fillable = [
        'title',
        'slug',
        'content',
        'category_id'
    ];

    // Tutte le colonne che NON sono abilitate al mass-assignment
    // protected $guarded = [
    //     'id',
    //     'created_at',
    //     'updated_at'
    // ];
}
