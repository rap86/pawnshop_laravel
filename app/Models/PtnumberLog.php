<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PtnumberLog extends Model
{
    use HasFactory;

    protected $table = 'ptnumber_logs';
    protected $guarded = [];

    public function transaction_payment() {
        return $this->belongsTo(TransactionPayment::class);
    }
}
