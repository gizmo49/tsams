<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirmedpay extends Model
{

    protected $table = "confirmedpayment";
    protected $fillable = ['pac','insti_id','link','payername','institution','purpose','amount','agent','datemu','bank'];



}
