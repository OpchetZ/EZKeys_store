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
    protected $fillable = ['no', 'user_id', 'name', 'email'];

    
    public function game(){
        return $this->hasMany(game::class,'user_id');
    }
    public function keygames(){
        return $this->hasMany(keysgame::class,'user_id');
    }

    
}
