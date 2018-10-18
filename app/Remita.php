<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remita extends Model
{
	
    protected $table = 'paymentinformation';
    protected $fillable = ['pac','link','fullname','phonenumber','mda','Service','Amount','description'];

}
