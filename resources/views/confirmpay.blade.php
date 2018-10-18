<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            
        <title>Treasury Single Account Managment</title>
        </head>

        <body>
       
        <style type="text/css">

        body{
          background-color: rgba(41,128,185,0.8);
          
          

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
          <div class="printme">
        	 <h1 style=" text-align: center;">TSAMS - <small>Treasury Single Account Managment System</small></h1>
           <p class="text-right" style="color: black;">
               
               |
               <span class="" > <a href="/" title="Go to our Homepage" id="printAnch" class=" noprint" style="color: black; text-decoration: none;">Home Page</a></span>
               </p>
              <div class="alert alert-info" style="font-size: 30px; text-align: center;">Payment Successful !!</div>

           <div id="subtext"></div>
       
        		  <div class="col-md-4 col-md-offset-4 text-center" style="text-align:center;">
                      <h3 style="color: black;">Transaction Details</h3>
                      <p><strong>Pac:</strong> {{$pac}} </p>
                      <p><strong>Payer's Name: </strong> {{$name}}</p>
                      <p><strong>Purpose: </strong>{{$service}}</p>
                      <p><strong>MDA:</strong> {{$mda}}</p>
                      <p><strong>Amount:</strong> {{$amount}}</p>
                      <br>
                      <br>
                     
              </div>
          

</div>


        <div class="col-sm-12 text-center" style="margin-top: 23px;">
                    <button  id="zoto" type="submit" style="background: #ce1a29; box-shadow: none;" onclick="printContent('container')" class="btn btn-primary"><i class="fa fa-print"></i> Print Receipt</button> 
                </div> 
              

</div>
<script>
function printContent(el){
  window.print();
/*var restorepage = $('body').html();
var printcontent = $('#' + el).clone();
$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);*/
}
</script>
</body>
</html>

