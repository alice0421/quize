<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    public function quiz_year()
    {
        return $this->belongsTo(QuizYear::class);
    }

    public function quiz_category()
    {
        return $this->belongsTo(QuizCategory::class);
    }

    public function choices()
    {
        return $this->HasMany(Choice::class);
    }

    public function explanation()
    {
        return $this->hasOne(Explanation::class);
    }

    public function note()
    {
        return $this->hasOne(Note::class);
    }
}
