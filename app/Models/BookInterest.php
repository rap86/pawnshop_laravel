<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookInterest extends Model
{
    use HasFactory;

    protected $table = 'book_interests';
    protected $guarded = [];
}
