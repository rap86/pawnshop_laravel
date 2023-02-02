<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $guarded = [];

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }

    public function item_interests() {
        return $this->hasMany(IntemInterest::class);
    }
}
