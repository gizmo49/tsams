<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

            <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            
        <title>Treasury Single Account Managment</title>
        <body>
       
        <style type="text/css">

        body{
          background-color: rgba(41,128,185,0.8);
          
          

        }
  input{
    margin-bottom: 5px;
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
            <div id="main"><table align="center"><tbody><tr><td>
            <h2 class="text-center">** Card Payment Details ** </h2><p>
      Please enter your card details carefully in the information fields provided below.  
  </p><table align="center" class="note" cellpadding="0" cellspacing="0" border="0"><caption>About  CVV2 and Name on Card</caption><tbody><tr><td><ol><li>The  CVV2  (CVC2) is the 3 digit code at the back of your card.
        
    </li><li>
       Name on Card is the name printed in front of your card (below the PAN). 
    </li></ol></td></tr></tbody></table><br><table align="center" cellpadding="1" cellspacing="1" border="0" class="table-bordered"><caption>Transaction Details</caption><tbody><tr><td>Amount:</td><td>{{$amt}}</td></tr><tr><td>Currency:</td><td>Naira</td></tr><tr><td>Description: </td><td>{{$pac}} / {{$serve}} , in favour of {{$insti}}</td></tr></tbody></table></td></tr></tbody></table>

    <h2 class="text-center">** Enter Card Details **</h2>
      @if($errors->any())
        <div class="alert alert-danger alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
{{$errors->first()}}
  </div>
        @endif
    <table align="center"><tbody><tr><td align="left" colspan="2"></td></tr><tr><td width="70%"><form method="post" action="/cardpay">
                      {!! csrf_field() !!}

    <table align="center" class="dates" >
    <tbody><tr style="margin-bottom: 10px;"><td class="titletr">
    Card Number:
      </td><td><input maxlength="19" class="inlineTarget" value="{{ old('cardnum') }}" type="text" name="cardnum" required><span id="inlineKey"></span></td>
      </tr>
      <input type="hidden" name="money" value="{{$amt}}">
      <tr><td class="titletr">CVV:
      </td><td><input value="{{ old('cvv') }}" type="text" name="cvv" maxlength="3" required></tr><tr><td class="titletr">Name on Card:
      </td><td><input value="{{ old('cardname') }}" type="text" name="cardname" required></td></tr><tr><td class="titletr">Expiration Date:</td><td>
      <input type="hidden" name="pac" value="{{$pac}}">
      <select name="expMon" required>
      <option selected="true" disabled="disabled" value="">Month</option>

      <option value="01">01</option>
      <option value="02">02</option>
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      </select>&nbsp;
              <select id="ExpYear" name="ExpYear" required>
              <option selected="true" disabled="disabled" value="">Year</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
              <option value="2026">2026</option>
              <option value="2027">2027</option>
              <option value="2028">2028</option>
              <option value="2029">2029</option>
              <option value="2030">2030</option>
              <option value="2031">2031</option>
              </select></td>
              </tr>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <tr><td style="padding:5px">
              <button  class="btn btn-primary text-right" type="submit" >Process</button></td></tr></tbody></table></form>
              </td><td valign="top"><span id="inlineTargetKeypad"></span></td></tr></tbody></table></div>
</div>


</style>
</body>
</head>
</html>