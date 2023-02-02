<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemInterest extends Model
{
    use HasFactory;

    protected $table = 'item_interests';
    protected $guarded = [];

    public function item() {
        return $this->belongsTo(Item::class);
    }
}
