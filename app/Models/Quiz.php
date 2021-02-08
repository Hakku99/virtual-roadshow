<?php

/*namespace App;*/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    //
    protected $table = 'quiz';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'start_date', 'end_date', 'question1', 'question2', 'question3', 'question4',
        'question5', 'question6', 'question7', 'question8', 'question9', 'question10', 'answer_for_question1',
        'answer_for_question2', 'answer_for_question3', 'answer_for_question4', 'answer_for_question5',
        'answer_for_question6', 'answer_for_question7', 'answer_for_question8', 'answer_for_question9',
        'answer_for_question10', 'campaign_id', 'deleted', 'created_by', 'status', 'random'
    ];

}
