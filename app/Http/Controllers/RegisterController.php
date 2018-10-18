<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use Illuminate\Support\Facades\Redirect;
use App\Mdalist;
use App\Remita;
use App\Confirmedpay;
use App\Channel;
use Carbon\Carbon;

class RegisterController extends Controller
{
   public function newRemita(Request $request){
   	//dd($request->all());
   	$this->validate($request, [
						'fullname' => 'required',
						'mda' => 'required',
						'Service' => 'required',
            'description' =>'required',
						'Amount' => 'required',
						'CaptchaCode' => 'required|valid_captcha',
						]);

	$first = mt_rand(1000, 9999);	$second = mt_rand(1000, 9999); $third = mt_rand(1000, 9999);
  $fourth = mt_rand(1000, 9999); $levi = time(). rand();

	$pac = $first.'-'.$second.'-'.$third.'-'.$fourth;
  $dail = $request->input('Amount');
  $tail = $request->input('description');
	$yul = number_format($dail);

   		
 	Remita::create( [
					'fullname' => $request->input('fullname'),
					'link' => $levi,
					'pac' => $pac,
          'description' =>$request->input('description'),
					'phonenumber' => $request->input('phonenumber'),
					'Service' => $request->input('Service'),
					'Amount' => $yul,
					'mda' => $request->input('mda'),
					
				]);

 	 $url = "/viewinvoice/$levi";
          return Redirect::to($url);



   }
   public function viewInvoice($link){

   	$instance = Remita::where('link',$link)->first();
$data = array(
    'pac'  => $instance->pac,
   'amt' => $instance->Amount,
   'insti' => $instance->mda,
   'serve' =>$instance->Service,
   'fullname' =>$instance->fullname,
   'desk' => $instance->description,
);

   	return View::make('paymentreceipt')
			->with($data);
   }
   public function mdaListing(Request $request){
   



        $q = $request->get('q');
        $result = Mdalist::whereRaw("MATCH(mdatitle) AGAINST('$q')", 
                array($q))->get();
        
         
		return $result;



     
   }
   public function selectAjax(Request $request,$radar)
    {
    	if($request->ajax()){
    	
    		$data = DB::table('serviceinstitute')->where('Institution',$radar)->pluck("Service")->all();
    		
    		
    		return response()->json(['options'=>$data]);
    	}


    	
    	
    }
    public function Findpac(Request $request){
        if($request->ajax()){
         $idea = Remita::where('pac',$request->pac)->first();
          return response()->json(['data' => $idea]);
        //dd($request->all());
          }
    }

    public function updateinfosp(Request $request){
     
      $this->validate($request, [
          "pac" => 'required|unique:confirmedpayment',
        "nameofpayer" => 'required|',
        "mda" => 'required|',
        'Service' => 'required|',
        'amount' => 'required|',
       
        "agent" =>'required|',
        
        
          ]);
     $bayo = DB::table('serviceinstitute')->where('Institution',$request->mda)
                                          ->where('Service',$request->Service)
                                          ->first();
              
         

                                         // dd($bayo->Price);
              $allinfo = $request->all();
        if ($request->amount >= $bayo->Price) {

          if ($request->pac) {
            # code...
          }
          return \Redirect::route('confirmtrans', ['data'=> $allinfo])->with('message', 'State saved correctly!!!');


        }else{
           return back()->withErrors(["The Amount for ".$bayo->Institution." '".$bayo->Service."' service is at least  ".$bayo->Price])->withInput(
    $request->except('amount')
);
          //dd('sorry we coant xontionue')
        }

    }
    public function Confirmpay(Request $request){
   $phone = $request->data;
   $saiyul = DB::table('mdalist')->where('mdatitle',$phone['mda'])
                                          ->first();
   $larank = time().rand();
   $today = getdate();
$d = $today['mday'];
$m = $today['mon'];
$y = $today['year'];
 
//return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    Confirmedpay::create( [
          'pac'  => $phone['pac'],
          'link' => $larank,
          'insti_id' => $saiyul->id,
          'payername' => $phone['nameofpayer'],
          'institution'   => $phone['mda'],
          'purpose'   => $phone['Service'],
           'amount'   => $phone['amount'],
          
          'agent'   => $phone['agent'],
          'datemu' => "$m/$d/$y",

          
        ]);

    $url = "/viewledger/$larank";
          return Redirect::to($url);
    }
    public function viewLedger($blac){
        $lokewa = Confirmedpay::where('link',$blac)->first();

        
        if(is_null($lokewa)){
          echo "not a valid url";
        }else{
          $demon = array(
       
    'pac'  => $lokewa->pac,
    'mda'   => $lokewa->institution,
    'name' => $lokewa->payername,
    'service'   => $lokewa->purpose,
     'amount'   => $lokewa->amount,
    'bank'   => $lokewa->bank,
    'agent'   => $lokewa->agent

);
   return View::make('confirmpay')->with($demon);
     }
    }


    public function Mdainconfirmed(Request $request){
      
        $q = $request->mda;
         $juls = Confirmedpay::where('insti_id',$q)->get();

        // $juls =  Confirmedpay::whereRaw("MATCH(institution) AGAINST('$q')",
        //         array($q))->get();
       
       return response()->json( $juls);

    }
    public function Mdainconfirmedbydate(Request $request){
      $javi = $request->zip;
      $pieces = explode("-", $javi);
      $shit = $pieces[0];
      $int = (int)$shit;
       $yeah = $int;
     
$drool = $pieces[1];
      $int2 = (int)$drool;
     
      $manth = $int2;
      $purge = $pieces[2];
      $daye = (int)$purge;
     
       //where("created_at","2017-07-20")->get();
        $date = \Carbon\Carbon::create($yeah, $manth, $daye, 0, 0, 0);

     $xavi = Confirmedpay::where('created_at', '>=', (string) $date)
        ->where('created_at', '<', (string) $date->addDays(1))
        ->get();
       
       //dd($xavi);
       return response()->json( $xavi);
    }

    public function Mdainconfirmedbybank(Request $request){
      $dave = Confirmedpay::where('bank',$request->zone)->get();
       
       return response()->json( $dave);
    }
    public function Mdainconfirmedbyagent(Request $request){
      $v = $request->agentid;
      $dante = Confirmedpay::whereRaw("MATCH(agent) AGAINST('$v')",
                array($v))->get();
        
       return response()->json( $dante);
    }

    public function regChannel(Request $request){
      //dd($request->all());
      Channel::create([
        'channel' => $request->channel,
        'kind' => $request->kind,
        ]);
      \Session::flash('message', "Congrats New Channel created");
    return \Redirect::back();
     // return back();
    }
     public function Navy(Request $request){
 
  $dogg = Remita::where('pac',$request->pac)->first();
  if($dogg){
    $green = array(
    'pac'  => $dogg->pac,
   'amt' => $dogg->Amount,
   'insti' => $dogg->mda,
   'serve' =>$dogg->Service,
   'fullname' =>$dogg->fullname,
   'desk' => $dogg->description,
);

    return View::make('paymentgateway')
      ->with($green);
  }else{
    echo "Not a valid URL";
  }
     // $instance = 

 // return view ('paymentgateway');
}
public function Verifycardpay(Request $request){
  $exstr = $request->expMon.$request->ExpYear;
  //dd($exstr);
    $dere = intval(str_replace(",","",$request->money));

  $imolo = DB::table('carddetails')->where('cardno',$request->cardnum)
                           ->where('cardname',$request->cardname)
                           ->where('cvv',$request->cvv)
                           ->where('expiration',$exstr)
                           ->where('balance','>=',$dere)
                          ->first();
        if ($imolo) {
          $chck = Confirmedpay::where('pac',$request->pac)->first();
          if ($chck) {
            return \Redirect::back()->withErrors(['That has already been paid For', 'The Message'])->withInput();
          }
          $jackson =  DB::table('paymentinformation')->where('pac',$request->pac)
                                          ->first();

         
           $dave = DB::table('mdalist')->where('mdatitle',$jackson->mda)
                                          ->first();
   $larank = time().rand();
   $today = getdate();
$d = $today['mday'];
$m = $today['mon'];
$y = $today['year'];
 //['pac','link','fullname','phonenumber','mda','Service','Amount','description'];


    Confirmedpay::create( [
          'pac'  => $jackson->pac,
          'link' => $larank,
          'insti_id' => $dave->id,
          'payername' => $jackson->fullname,
          'institution'   => $jackson->mda,
          'purpose'   => $jackson->Service,
           'amount'   => $jackson->Amount,
          
        ]);

    $url = "/viewledger/$larank";
          return Redirect::to($url);

        }else{
           return \Redirect::back()->withErrors(['Could not Process Payment ', 'The Message'])->withInput();
          //  echo "invalid Card Details";
        }

 
}
public function bymymda(Request $request){
  //dd($request->all());
          // $eazi = Confirmedpay::where('insti_id',$request->mymda)->get();

            $url = "/recordmda/$request->mymda";
          return Redirect::to($url);


}
public function FGmdainconfirmedbydate(Request $request){
      $navas = $request->mdaid;
      $javi = $request->zip;
      $pieces = explode("-", $javi);
      $shit = $pieces[0];
      $int = (int)$shit;
       $yeah = $int;
     
$drool = $pieces[1];
      $int2 = (int)$drool;
     
      $manth = $int2;
      $purge = $pieces[2];
      $daye = (int)$purge;
     
       //where("created_at","2017-07-20")->get();
        $date = \Carbon\Carbon::create($yeah, $manth, $daye, 0, 0, 0);

     $xavi = Confirmedpay::where('created_at', '>=', (string) $date)
        ->where('created_at', '<', (string) $date->addDays(1))
        ->where('insti_id',$navas)
        ->get();
       
       //dd($xavi);
       return response()->json( $xavi);
    }

    
}

