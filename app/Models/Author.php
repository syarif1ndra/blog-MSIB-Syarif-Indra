<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
<<<<<<< HEAD
        'name', 'bio',
=======
        'name', 'email', 'bio',
>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
    ];
    public function posts()
{
    return $this->hasMany(Post::class);
}

}
