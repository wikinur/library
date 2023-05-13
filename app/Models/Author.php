<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'email', 'phone_number', 'address'];
    use HasFactory;

    //Relation one to many
    public function books()
    {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }
}
