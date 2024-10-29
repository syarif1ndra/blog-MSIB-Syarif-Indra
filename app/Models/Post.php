<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
<<<<<<< HEAD
        'content', // Ubah menjadi lowercase
=======
        'Content',
>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
        'image',
        'is_published',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
<<<<<<< HEAD

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }
=======
    public function author()
{
    return $this->belongsTo(Author::class);
}
public function getImageUrlAttribute()
{
    return asset('storage/' . $this->image); }

>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
}
