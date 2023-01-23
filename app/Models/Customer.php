<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $guarded = [];
    protected $casts = [
        'birthdate' => 'date:Y-m-d'
    ];

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }

    public function customer_logs() {
        return $this->hasMany(CustomerLog::class);
    }
}
