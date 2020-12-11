<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id','menu_id','quantity'
    ];

    public function menu() {
        return $this->hasOne('App\Menu','id', 'menu_id');
    }
}
