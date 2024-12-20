<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    /** @use HasFactory<\Database\Factories\BillFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'month', 'year', 'amount', 'bill_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
