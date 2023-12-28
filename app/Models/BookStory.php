<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookStory extends Model
{
    use HasFactory;

    protected $table = 'book_stories';

    protected $primaryKey = 'name';

    protected $fillable = ['ISBN', 'value'];

    public $timestamps = false;

}
