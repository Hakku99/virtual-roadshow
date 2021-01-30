<?php

/*namespace App;*/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    //
    protected $table = 'gift';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image_name', 'elaboration', 'status', 'price', 'amount', 'created_at','updated_at', 'deleted', 'created_by', 'expired_date'
    ];
}
