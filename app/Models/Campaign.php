<?php

/*namespace App;*/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    //
    protected $table = 'campaign';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'start_date', 'end_date', 'section1', 'section2', 'section3', 'quiz','quiz_id', 'deleted', 'created_by'
        , 'image_name', 'status', 'video_link', 'contact_number', 'contact_email',
    ];
}
