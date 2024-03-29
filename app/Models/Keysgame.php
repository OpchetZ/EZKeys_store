<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keysgame extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'keysgames';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['key', 'game_id', 'key_id','customer_id','user_id'];


    public function game(){
        return $this->belongsTo(game::class,'game_id','id');
    }

    public function customer(){
        return $this->belongsTo(customer::class,'customer_id','id');
    }

    public function user(){
        return $this->belongsTo(user::class,'user_id','id');
    }
    
    
}
