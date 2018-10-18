<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = "carddetails";

    protected $fillable  = ['id','cardno','cvv','cardname','expiration','balance'];

}
