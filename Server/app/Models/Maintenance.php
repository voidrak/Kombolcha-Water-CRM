<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    /** @use HasFactory<\Database\Factories\MaintenanceFactory> */
    use HasFactory;

    protected $fillable = ['address', 'submitted_by', 'description', 'phone_number', 'completed', 'approved'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'submitted_by');
    }
}
