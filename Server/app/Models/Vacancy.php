<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    /** @use HasFactory<\Database\Factories\VacancyFactory> */
    use HasFactory;

    protected $fillable = ['type', 'location', 'title', 'created_by', 'description'];


    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
