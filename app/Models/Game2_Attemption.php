<?php

/*namespace App;*/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game2_Attemption extends Model
{
    //
    protected $table = 'gameTWO_attemptions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'participant_id', 'attempt_date', 'scores', 'participant_name'
    ];
}
