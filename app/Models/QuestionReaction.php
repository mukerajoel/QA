<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class QuestionReaction extends Model
{
    use HasFactory;

    public function question(){
        return $this->belongsTo(Question::class);
    }
}
