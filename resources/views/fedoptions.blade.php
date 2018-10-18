
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
           
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
 
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="./css/base.css">

        <title>Treasury Single Account Managment</title>
        

</head>
<style type="text/css">
  body{
   background-color: white; 
  }
 
</style>
<body>
<div style="border:1px solid black; text-align: center; margin: 20px;">
<tbody>
<tr>
            <td>
                <img  src="img/unn.jpg" style="width: 6%; padding-top: 10px; padding-right: 20px;">
            </td>
            <td>
                <img  src="img/coat.jpg" style="width: 10%;  padding-right: 20px;">
            </td>
            <td >
                <img src="img/cbn.jpg" style="width: 6%; padding-top: 8px;">
            </td>
            </tr>
            </tbody>
        
<h1 style="color: black; word-spacing: 5px;">Treasury   Single   Account   Managment   System   (TSAMS) </h1>
<h2 class="text-center" style="color: black; word-spacing: 20px;">Ministries Departments and Agencies(MDAs)</h2></div>

<div class="container" style="">
      <div class="col-md-6">
        <h3 class="dark-grey">Federal Government Admin Page</h3>
       @if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

        <form id="matter" class="form-horizontal" role="form" method="POST" action="{{ url('/bymymda') }}">
                        {!! csrf_field() !!}
                           

        <div class="form-group col-lg-12">
          <label>Select MDA</label>
         <select class="form-control" id="selectmda" name="mymda" required>
<option value="" selected disabled>Select MDA</option>
<option value="1">Federal Road Safety Commission</option>
<option value="2">Federal Inland Revenue Service</option>
<option value="3">Federal Ministry of Agriculture</option>
<option value="4">Nigerian National Petroleum Corporation</option>
</select>
        </div>
        
        <div class="form-group col-lg-6" style="padding-left: 11px;">
                  <button id="plex" type="submit" style="background: black; box-shadow: none;" class="btn btn-primary">View All For selected MDA</button> 

        <!-- <label for="kind">Channel kind</label>
          <div class="radio" name="kind">
          <label><input type="radio" name="kind" value="1" checked="checked">Agent</label>
          </div>
          <div class="radio">
          <label><input type="radio" name="kind" value="0">Bank</label>
          </div>
 -->
        </div>
        <!-- <div class="form-group col-lg-6">
          <label>Repeat Password</label>
          <input type="password" name="" class="form-control" id="" value="" required>
        </div> -->
       
      
        
        <div class="col-sm-6" style="margin-top: 23px;">
          
        </div>  
      

      </div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
<div class="col-md-6">
<div class="text-right">
  <button class="btn btn-danger" onclick="location.href='/logout';">Logout</button>

  <button class="btn btn-danger" onclick="location.href='/';">Go Home</button>
  <br>
  <br>
</div>
</div>

      
</body>
</html>