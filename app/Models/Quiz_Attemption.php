<?php

/*namespace App;*/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz_Attemption extends Model
{
    //
    protected $table = 'quiz_attemptions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quiz_id', 'participant_id', 'attempt_date', 'scores'
    ];
}
