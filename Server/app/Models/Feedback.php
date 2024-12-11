<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    /** @use HasFactory<\Database\Factories\FeedbackFactory> */
    use HasFactory;

    protected $fillable = ['message', 'submitted_by'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'submitted_by');
    }
}
