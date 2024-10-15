<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'Content',
        'image',
        'is_published',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
{
    return $this->belongsTo(Author::class);
}
// Di dalam Post.php model
public function getImageUrlAttribute()
{
    return asset('storage/' . $this->image); // Asumsi 'image' adalah kolom yang menyimpan nama file gambar
}

}
