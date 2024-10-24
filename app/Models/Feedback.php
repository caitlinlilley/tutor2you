<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'content', 'submitted_by'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function submittedBy()
{
    return $this->belongsTo(User::class, 'submitted_by');
}
}
