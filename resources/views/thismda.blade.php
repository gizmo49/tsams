<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
           
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- <script>
    $( function() {
      $( "#impdate" ).datepicker({
        changeMonth: true,
        changeYear: true,
        constrainInput: false

      });
    } );
    </script> -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <title>Treasury Single Account Managment</title>
        

</head>
<body>
<style type="text/css">
    #goname:hover{
        cursor: pointer;

    }
      #fibi:hover{
        cursor: pointer;

    }
    #fbank:hover{
    cursor: pointer;

    }
    #fagent:hover{
    cursor: pointer;
    }
    #impagent:hover{
      cursor: pointer;
    }
</style>
<script type="text/javascript">
            $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
        </script>
<div style="border:1px solid black; text-align: center; margin: 20px;">
<?php $zoho = App\Mdalist::where('id',$thismda)->first(); ?>
<tbody>
<tr>
            <td>
                <img  src="{{url('img/unn.jpg')}}" style="width: 6%; padding-top: 10px; padding-right: 20px;">
            </td>
            <td>
                <img  src="{{url('img/coat.jpg')}}" style="width: 10%;  padding-right: 20px;">
            </td>
            <td >
                <img src="{{url('img/cbn.jpg')}}" style="width: 6%; padding-top: 8px;">
            </td>
            </tr>
            </tbody>
          
<h1 style="color: black; word-spacing: 5px;">Treasury   Single   Account   Managment   System   (TSAMS) </h1>
<h2 class="text-center" style="color: black; word-spacing: 20px;">{{$zoho->mdatitle}}</h2></div>
<div class="container">
<div class="text-right">

  <button class="btn btn-danger" onclick="location.href='/fgoptions';">Home</button>

  <button class="btn btn-danger" onclick="location.href='/logout';">Logout</button>

  <!--  <button class="btn btn-danger" onclick="location.href='/cbn-admin-login';">Go Home</button> -->
  <br>
</div>

<h2 style="color: grey;">TSAMS - <span style="color: black; font-size: 20px;">{{$zoho->mdatitle}}</span></h2>
 <p class="text-right" style="color: black;">
               <!-- <span class="add-on" style="text-align: left;"><i class="fa fa-eye-slash"></i><a href="#" id="viewDetail" class="viewDetail" style="color: black; text-decoration: none;"><span id="spDetail">show details</span></a></span> -->
               |
               <span class="" onclick="window.print();"> <a href="#" title="print receipt" id="printAnch" class=" noprint" style="color: black; text-decoration: none;"><i class="fa fa-print"></i> Print Table</a></span>
               </p>

<div class="input-group"> <span id="fibi" class="input-group-addon">Filter by date</span>

<input type="" class="form-control" name="" id="impdate" placeholder="YY-MM-DD">
</div>


<table class="table table-bordered" id="monger">
<?php $tablerecord = DB::table('confirmedpayment')
                              ->where('insti_id',$thismda)->get();
$total = 0;
?>
    <thead>
        <tr>
            <th>Payer's Name</th>
            <th>PAC</th>
            <th>MDA</th>
            <th>purpose</th>
            <th>Bank</th>
            <th>Agent</th>
            <th>Amount</th>
        </tr>
    </thead>

    <tbody class="searchable">
    @foreach($tablerecord as $rec)
    <?php $total = $total + $rec->amount?>
        <tr>
            <td>{{$rec->payername}}</td>
            <td>{{$rec->pac}}</td>
            <td>{{$rec->institution}}</td>
            <td>{{$rec->purpose}}</td>
            <td>{{$rec->bank}}</td>
            <td>{{$rec->agent}}</td>
            <td>{{$rec->amount}}</td>
        </tr>
    @endforeach 
    <tr>

            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <th>Total Amount:</th>
            <td>{{$total}}</td>
        </tr>
    </tbody>
</table>
<input type="hidden" name="" id="mdaid" value="{{$thismda}}">
</div>

<script>
function Coporall(dexter){
    console.log(dexter);
    var pure = $('#mdaid').val();
       $.ajax({
        

            type:"get",
            url:'/fgmdainconfirmedbydate/',
             data: {
              'zip': dexter, 
              'mdaid' : pure,
            
        },
            dataType: 'json',
            success: function(data){
                    console.log(data);
         
             $.each(data, function(ki, vali) {
               // console.log(vali);
               
      $('<tr><td id="">'+ vali['payername'] +'</td><td id="">'+ vali['pac'] +'</td><td id="">'+ vali['institution'] +'</td><td id="">'+ vali['purpose'] +'</td><td id="">'+ vali['bank'] +'</td><td id="">'+ vali['agent'] +'</td><td id="">'+ vali['amount'] +'</td><tr>').appendTo('#monger');
               });
 var a = 0;
    $.each(data, function(ki, kel) {
        a += parseInt(kel['amount']);
    });
   
            $('<tr><td id=""></td><td id=""></td><td id=""></td><td id=""><td id=""></td></td><th id="">Total</th><td id="">'+ a +'</td><tr>').appendTo('#monger');
            },
            error: function(data){
              console.log('something went wrong');
              
                }
           
            })
}
       

      
     
         $('#fibi').click( function(){
           $("#monger tbody").remove();

          var delmi = $('#impdate').val();
        Coporall(delmi);
        });
        
</script>

</body>
</html>