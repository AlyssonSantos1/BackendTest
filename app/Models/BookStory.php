<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookStory extends Model
{
    use HasFactory;

    protected $table = 'book_stories';

    protected $fillable = ['name','ISBN', 'value'];

    public $timestamps = false;

}
