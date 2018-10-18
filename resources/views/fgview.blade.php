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

<div class="container" style="margin-top: -50px;">
  <div class="row" >
    <div class="col-md-4 col-md-offset-4 text-center" >

      <div class="search-box">
      
        <div class="caption" style="margin-bottom: 10px;">
          <h3 style="color: green;">FG Administrator </h3>
         <img src="./img/coat.jpg">
        </div>
        <form class="loginForm" role="form" method="POST" action="{{ url('/loginads') }}">
                        {{ csrf_field() }}
       
          <div class="input-group">
            <input type="text" id="name"  name="username" class="form-control" placeholder="username" required>
            <input type="password" id="paw" name="password" class="form-control" placeholder="Password" required>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input style="background: green;" type="submit" id="submit" class="form-control" value="Login">
          </div>
        </form>
      </div>
    </div>
    
  </div>
</div>

</body>
</html>