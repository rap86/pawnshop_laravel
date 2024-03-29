<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $guarded = [];

    public function book_interests() {
        return $this->hasMany(BookInterest::class);
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}
