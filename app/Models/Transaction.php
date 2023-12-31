<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $guarded = [];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function transaction_items() {
        return $this->hasMany(TransactionItem::class);
    }

    public function item() {
        return $this->belongsTo(Item::class);
    }

    public function transaction_payments() {
        return $this->hasMany(TransactionPayment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }
}
