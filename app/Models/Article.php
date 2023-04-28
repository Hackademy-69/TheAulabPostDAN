<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title', 
        'subtitle',
        'body', 
        'img',
        'user_id',
        'category_id',
    ];

    public function toSearchableArray(){
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'category' => $this->category,
            'subtitle' => $this->subtitle,
        ];
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
