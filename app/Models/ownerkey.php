<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ownerkey extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ownerkeys';

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
    protected $fillable = ['name', 'key', 'user_id', 'key_id', 'game_id'];

    public function game(){
        $this->belongsTo(game::class,'game_id','id');
    }
    public function key(){
        $this->belongsTo(Keysgame::class,'key_id','id');
    }
    public function customer(){
        $this->belongsTo(customer::class,'user_id','id');
    }
}
