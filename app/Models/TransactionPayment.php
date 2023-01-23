<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionPayment extends Model
{
    use HasFactory;

    protected $table = 'transaction_payments';
    protected $guarded = [];

    protected $casts = [
        'payment_startdate' => 'date:Y-m-d',
        'payment_enddate' => 'date:Y-m-d'
    ];

    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }

    public function ptnumber_logs() {
        return $this->hasMany(PtnumberLog::class)->orderBy('id', 'DESC');
    }
}
