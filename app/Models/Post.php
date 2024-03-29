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
        'category_id',
        'cover_img'
    ];

    // Tutte le colonne che NON sono abilitate al mass-assignment
    // protected $guarded = [
    //     'id',
    //     'created_at',
    //     'updated_at'
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        'id',
        'category_id',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['full_cover_img'];

    /*
        "Computed Properties" del model
    */
    // full_cover_img
    public function getFullCoverImgAttribute()
    {
        if ($this->cover_img) {
            return asset('storage/'.$this->cover_img);
        }
        else {
            return null;
        }
    }

    /*
        Relationships
    */
    // One-to-Many con Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Many-to-Many con Tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
