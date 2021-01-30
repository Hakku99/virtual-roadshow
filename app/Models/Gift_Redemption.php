<?php

/*namespace App;*/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gift_Redemption extends Model
{
    //
    protected $table = 'gift_redemption';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gift_id', 'delivered', 'approved', 'created_at','updated_at', 'created_by', 'cancelled', 'delivering',
        'f_reason'
    ];
}
