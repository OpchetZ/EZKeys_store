<?php

namespace App\Models;

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customers';

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
    protected $fillable = ['user_id', 'name', 'email'];

    
    public function game(){
        return $this->hasMany(game::class,'id');
    }
    public function keygames(){
        return $this->hasMany(keysgame::class,'key_id');
    }
    public function user(){
        return $this->belongsTo(user::class,'user_id','id');
    }

    
}
