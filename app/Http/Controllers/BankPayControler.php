<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Confirmedpay;
use DB;

class BankPayControler extends Controller
{
        public function updateinfoviasp(Request $request){

      $this->validate($request, [
          "pac" => 'required|unique:confirmedpayment',
        "nameofpayer" => 'required|',
        "mda" => 'required|',
        'Service' => 'required|',
        'amount' => 'required|',
        "bank" => 'required|',
       
        
        
          ]);
     $bayo = DB::table('serviceinstitute')->where('institution',$request->mda)
                                          ->where('Service',$request->Service)
                                          ->first();

                                         // dd($bayo->Price);
              $allinfo = $request->all();
        if ($request->amount >= $bayo->Price) {

  $phone = $request->all();
     $saiyul = DB::table('mdalist')->where('mdatitle',$phone['mda'])
                                          ->first();

   
   $larank = time().rand();
   $today = getdate();
$d = $today['mday'];
$m = $today['mon'];
$y = $today['year'];
 

    Confirmedpay::create( [
          'pac'  => $phone['pac'],
          'insti_id' => $saiyul->id,
          'link' => $larank,
          'payername' => $phone['nameofpayer'],
          'institution'   => $phone['mda'],
          'purpose'   => $phone['Service'],
           'amount'   => $phone['amount'],
          'bank'   => $phone['bank'],
          'datemu' => "$m/$d/$y",

          
        ]);

    $url = "/viewledger/$larank";
          return redirect($url);

        }else{
           return back()->withErrors(["The Amount for ".$bayo->Institution." '".$bayo->Service."' service is at least  ".$bayo->Price])->withInput(
    $request->except('amount')
);
          //dd('sorry we coant xontionue')
        }

    }

}
