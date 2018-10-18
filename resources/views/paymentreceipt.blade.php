<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <title>Payment Invoice</title>
       <!--  #3c763d -->
       <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	</head>
    <style type="text/css">
        td img{

        }
        .center_div{
             margin: 0 auto;
             width:60% ;
            
        }
        .modal-backdrop {
   background-color: transparent;
}
        body{
            background-color: rgba(41,128,185,0.8);
        }
    </style>
        <body>
         <div class="container center_div">
         <div class="col-sm-12">
               <div class="text-right" style="padding-top: 20px;">
                   <button class="btn" onclick=" window.location.replace('/')" style="background: #CE1A29; color: white;"> go home</button>
               </div></div>
               </div>
        	   <h1 style=" text-align: center;">TSAMS - <small>Treasury Single Account Managment System</small></h1>

        	   <div class="container center_div">

               <!--  <p class="text-right"> -->
                <p class="text-right" style="color: black;">
               <span class="add-on" style="text-align: left;"><i class="fa fa-eye-slash"></i><a href="#" id="viewDetail" class="viewDetail" style="color: black; text-decoration: none;"><span id="spDetail">show details</span></a></span>
               |
               <span class="" onclick="printContent('panelBody');"> <a href="#" title="print receipt" id="printAnch" class=" noprint" style="color: black; text-decoration: none;"><i class="fa fa-print"></i> PAC Invoice</a></span>
               </p>
               <div style="background: white; padding: 20px; border-radius: 5px;">
               <tbody >
                   <tr>
                   <input type="hidden" id="jobs" value="{{$pac}}">
                       <td><strong>Your Payment Access Code: </strong> {{$pac}}</td><br>
                        <td><strong>Payment Made in Favour of: </strong> {{$insti}}</td>
                        <td><strong>Total Payable : </strong>  ₦ {{$amt}}</td>
                     </tr>
               </tbody>
               </div>
    <div id="panelBody" class="panel-body luth hidden " style="display: block; background: white; margin-top: 40px; margin-bottom: 40px;">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label style= "text-align: left;" class="col-sm-5 control-label">Payer:</label>
                                    <div class="col-sm-7">{{$fullname}}</div>
                                </div>
                                <div class="form-group">
                                    <label style= "text-align: left;" class="col-sm-5 control-label">Name of Beneficiary:</label>
                                    <div class="col-sm-7"> {{$insti}} </div>
                                </div>
                                
                                    
                                    
                                        <div class="form-group">
                                            <label style= "text-align: left;" class="col-sm-5 control-label">Service Type:</label>
                                            <div class="col-sm-7">{{$serve}}</div>
                                        </div>
                                    
                                
                                
                                
                                
                                
                                    <div class="form-group">
                                        <label style= "text-align: left;" class="col-sm-5 control-label">Description:</label>
                                        <div class="col-sm-7">
                                            
                                                
                                             {{$desk}}
                                            
                                        </div>
                                    </div>
                                
                                <div class="form-group">
                                    <label style= "text-align: left;" class="col-sm-5 control-label">Amount:</label>
                                    <div class="col-sm-7">
                                    <s>₦</s>
                                       {{$amt}}
                                    </div>
                                </div>
                                

                                
                            </form>
                        </div>

        	   		<div style="background: #ce1a29; padding: 3px;">
        	   		  <h3 style=" text-align: center; margin-top: 10px;">Choose Payment Channel</h3>
                      </div>
        	   		  <div class="row" style="padding: 40px;">
        	   		  	<!-- 	<div class="col-sm-4" style="margin-right:20px; background-color: black; color: white; width: 300px; height: 200px; text-align: center; border-radius: 5px; ">
        	   		  			<h3>Internet Banking</h3>
                                <tbody>
                                    <tr>
                                        <td> <img style="width: 50px;
            height: 50px;" src="{{ URL::asset('img/gtb.png') }}"></td>
         <td><img style="width: 50px;
            height: 50px;" src="{{ URL::asset('img/fcmb.png') }}"></td>
                                        <td><img style="width: 50px;
            height: 50px;" src="{{ URL::asset('img/zenith.png') }}"></td>
                                        <td> <img style="width: 50px;
            height: 50px;" src="{{ URL::asset('img/access.png') }}"></td>
                                        <td> <img style="width: 50px;
            height: 50px;" src="{{ URL::asset('img/wema.png') }}"></td>
                                        <td><img style="width: 50px;
            height: 50px;" src="{{ URL::asset('img/ibtc.png') }}"></td>
                                        <td><img style="width: 50px;
            height: 50px;" src="{{ URL::asset('img/skye.png') }}"></td>
                                        <td><img style="width: 50px;
            height: 50px;" src="{{ URL::asset('img/keystone.png') }}"></td>
                                    </tr>
                                </tbody>
                               
                                
                               
                               
                                
                                
                                
        	   		  		</div> -->
		<div class="col-sm-4" style="margin-right:20px; background-color: #F0AE4C; color:white; width: 300px; height: 200px; border-radius: 5px; ">
			<h3 class="text-center" >Payments Via Accredited Agents</h3>
 <div class="text-center">
    <a href="/login-via-agent">
  <i class="fa fa-users" aria-hidden="true" style="font-size: 100px; color: black;"></i></a>

 </div>

		</div>
        	   		  		<div class="col-sm-4" style="margin-right:20px; background-color: #363F45; color: white; width: 300px; height: 200px; border-radius: 5px; ">
        	   		  			<h3 class="text-center">Bank Payment</h3>
<div class="text-center">
  <a href="/login-via-bank">
   <i class="fa fa-university" aria-hidden="true" style="font-size: 90px; color: black; text-align: center;"></i> </a>
   </div>

        	   		  		</div>
        	   		  		<div class="col-sm-4" style="margin-right:20px; margin-left:170px; margin-top:30px; background-color: white; width: 300px; height: 200px;  text-align: center; border-radius: 5px; ">
        	   		  			<h3 class="text-center" >Pay now with Cards or Wallet</h3>
                              <i data-toggle="modal" data-target="#myModal" style="font-size: 70px;" class="fa fa-credit-card " aria-hidden="true"></i>
                                
        	   		  		</div>
        	   		  		
        	   		  </div>
        	   </div>
<!--  -->


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Card Payment</h4>
        </div>
        <div class="modal-body">
        <div id="paymentDiv" class="ui-dialog-content ui-widget-content" style="width: auto; min-height: 32px; max-height: none; height: auto;">
        <div id="content">
            <p class="strong">Please be sure you have Enrolled your card to pay on our platform</p> <p>TSAMS requires that the card is enrolled to pay/buy on TSAMS.</p>

             
        <ol>
           <!--  <li>Locate a nearest VISA/VPAY enabled ATM</li>
            <li>Insert your card and punch in your PIN</li>
            <li>Select the PIN change option</li>
            <li>Select the Internet PIN (i-PIN) change option</li>
            <li>Insert any four - six digits of your choice as your iPIN</li>
            <li>Re-enter the digits entered in Step 5 above</li>
            <li>If you have performed the above steps correctly, a message is displayed informing you you're your PIN was changed successfully. This means that your card is now enrolled in the VbV (Verified by Visa) program and may be used for any internet related transactions.</li>
            <li>Note that the word 'iPIN' , 'Password' and VbV code are the same</li>
            <li>You can now pay/buy on remita.net securely</li> -->
        </ol>
            

        <div class="dialogloading text-right width100"></div>
    </div>
    </div>
        </div>
        <div class="modal-footer">
        <a class="btn btn-primary" href="{{ route('test.route', array('pac' => $pac)) }}">Proceed</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
    </div>
		</body>


<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#viewDetail').click(function(){
            var vee = $(this).text();
           
            if( vee == 'show details'){


                 $('#panelBody').removeClass('hidden');
                $('#viewDetail').html('hide details');
                 var last = $(this).text();
                 console.log(last);
            }else if(vee == 'hide details'){
              $('#panelBody').addClass('hidden');  
               $('#viewDetail').html('show details');
            }

        });
    });
    
</script>

<script>
function printContent(el){
var restorepage = $('body').html();
var printcontent = $('#' + el).clone();
$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);
}
</script>
</html>