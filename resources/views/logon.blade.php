<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            
        <title>Treasury Single Account Managment</title>
        <body>
       
        <style type="text/css">

        body{
          background-color: rgba(41,128,185,0.8);
          
          

        }
        .loading{
          background-color: #ffffff;
          background-image: url("http://loadinggif.com/images/image-selection/3.gif");
          background-size: 25px 25px;
          background-position:right center;
          background-repeat: no-repeat;
        }
          .twitter-typeahead{
                  
           position: absolute;
           top: 0px;
           left: 0px;
           border-color: transparent;
           box-shadow: none;
           outline: none;
           opacity: 1;
           
           width:100%;
          }
 .twitter-typeahead:focus{

    outline-width: 0;
 }
 .tt-menu{
    overflow-y: auto;
    max-height: 70.4px;
    background-color: white;
    width:100%;
 }
 .tt-suggestion{
    text-align: left;
    margin-left: 5px;
   
 }
 .tt-suggestion:hover{
    background-color: blue;
    cursor: pointer;
 }

.tt-hint{
    color: #eaecef;
}
.center_div{
   margin: 0 auto;
   background: white;
    width:70% ;
}

        </style>
<script type="text/javascript">
            $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
        </script>
       
        	<div class="container center_div">

        	 <h1 style=" text-align: center;">TSAMS - <small>Treasury Single Account Managment System</small></h1>
           <div id="subtext"></div>
        	 <!-- <h3 style="text-align: center;">Federal government Agencies (MDA'S)</h3> -->
<form class="form-horizontal" id="matter" role="form" method="POST" action="{{ url('/logon') }}" >  

{!! csrf_field() !!}
     



        	<span  style="color: red;  text-align: left;">(fields marked * are required)</span><br>
          <br>
   
<div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">

    <label style=" text-align: left;
 " class="control-label col-sm-2" for="fullname">Payer's FullName <span style="color: red;">*</span></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="fullname" value="{{ old('fullname') }}">

        @if ($errors->has('fullname'))
            <span class="help-block">
                <strong>{{ $errors->first('fullname') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label style="text-align: left;" class="control-label col-sm-2" for="phonenumber">Payer's Phone number </label>
    <div class="col-sm-10">
    <input type="select" class="form-control" name="phonenumber" placeholder="" value="{{ old('phonenumber') }}" >
    </div>
  </div>

<div class="form-group">
    <label style="text-align: left;" class="control-label col-sm-2" for="email">Payer's email </label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" value="{{ old('email') }}">
       
    </div>

  </div>

  
  <div class="form-group{{ $errors->has('mda') ? ' has-error' : '' }}">
    <label  style="text-align: left;" class="control-label col-sm-2" for="mda">Name of MDA <span style="color: red;">*</span></label>
    <div class="col-sm-10">
      <input type="text" class="form-control search-input" name="mda" value="{{ old('mda') }}">
       @if ($errors->has('mda'))
            <span class="help-block">
                <strong>{{ $errors->first('mda') }}</strong>
            </span>
        @endif
    </div>
  </div>
 
 

  <div class="form-group{{ $errors->has('Service') ? ' has-error' : '' }}">
    <label style="text-align: left;" class="control-label col-sm-2" for="Service">Name of Service/Purpose <span style="color: red;">*</span></label>
    <div class="col-sm-10">
      <select id="Service" class="form-control" name="Service">
    
		    <option>[-  Select Service/Purpose -]</option>
		    
        </select>
    
    </div>
  </div>

<div class="form-group hidden" id="DESCRIPTION">
    <label style="text-align: left;" class="control-label col-sm-2" for="DESCRIPTION">DESCRIPTION <span style="color: red;">*</span> </label>
    <div class="col-sm-10">
      <input type="textarea"  maxlength="25" class="form-control" name="description" id="DESCRIPTION" value="{{ old('DESCRIPTION') }}">
       
    </div>

  </div>

  <div  class="form-group{{ $errors->has('Amount') ? ' has-error' : '' }}">
    <label style="text-align: left;" class="control-label col-sm-2" for="Amount">Amount to pay(₦) <span style="color: red;">*</span></label>
    <div class="input-group">
      <input type="select" class="form-control" name="Amount" value="{{ old('Amount') }}"><span class="input-group-addon" id="basic-addon1">Currency Currency </span>
           
             <select name="currencyCode" class="select width100 form-control required valid" id="currencyCode" aria-required="true" aria-invalid="false">
          <option value="">[- Currency  -]</option>
          
            <option  selected="selected" value="NGN">Nigerian Naira</option>
          
      </select>
         @if ($errors->has('Amount'))
            <span class="help-block">
                <strong>{{ $errors->first('Amount') }}</strong>
            </span>
        @endif
    </div>
  </div>

<div class="form-group{{ $errors->has('CaptchaCode') ? ' has-error' : '' }}">
    <label style="text-align: left;" class="control-label col-sm-2">Captcha</label>

    <div style= "position: relative;" class="col-sm-10">
        {!! captcha_image_html('ContactCaptcha') !!}
       

        @if ($errors->has('CaptchaCode'))
            <span class="help-block">
                <strong>{{ $errors->first('CaptchaCode') }}</strong>
            </span>
        @endif
         <input class="form-control" type="text" id="CaptchaCode" name="CaptchaCode" style="margin-top:30px;">
    </div>
</div>
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
   
   
      <button type="submit" style="margin-left: 150px;" class="btn btn-danger">Proceed</button> 
      <br>
      <br>
      <br>
      <br>
    

</form>
</div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

            <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
            <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.ui.min.js"></script>
            
        <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

  <script type="text/javascript" src="./js/suggest.js"></script>

<script type="text/javascript">
  
  jQuery(document).ready(function($) {
    $('.search-input').keyup( function() {
      $(this).addClass('loading');
      $('#Service').html('[-  Select Service/Purpose -]');
          $('#DESCRIPTION').addClass('hidden');

   //console.log($(this).val()); 
});
    $('.search-input').focusout( function() {
      $(this).removeClass('loading');
 
});
      
    });
 
</script>

<style type="text/css">
	.BDC_ReloadIcon{
		position: relative;
	}
	.BDC_SoundLink{
		display: none;
	}
</style>
</body>
</head>
</html>