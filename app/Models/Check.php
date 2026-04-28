<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;

    // Eto yung idadagdag natin para payagan ma-save itong mga fields na 'to mula sa form
    protected $fillable = [
        'check_number',
        'voucher_number',
        'voucher_date',
        'payee',
        'amount',
        'remarks',
        'account_description',
    ];
}