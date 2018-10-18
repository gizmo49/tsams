<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            
        <title>Treasury Single Account Managment</title>
        </head>

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
        <h2 class="text-center">Bank payment</h2>
           <div class="text-right"><a href="/login-via-agent">Pay through an agent</a></div>
           <div id="subtext"></div>
        	 <!-- <h3 style="text-align: center;">Federal government Agencies (MDA'S)</h3> -->
           @if($errors->any())
        <div class="alert alert-danger alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
{{$errors->first()}}
  </div>
        @endif
<form  id="joey" role="form" method="POST" action="{{ url('/updateinfoviasp') }}">
                  {!! csrf_field() !!}

                    <div class="form-group col-lg-12">  

                       <!--  <label>Preferred Method</label> -->
                         <label>PAC</label>
                        <input type="" name="pac" class="form-control" id="pac" value="{{old('pac')}}" >
                       
                       
                        
                        </select>
                    </div>
                    <div class="form-group col-lg-12">
                        <label>NAME OF PAYER</label>
                        <input type="" name="nameofpayer" class="form-control" id="fullname" value="{{old('nameofpayer')}}" readonly="readonly">
                    </div>
                    <div class="form-group col-lg-12">
                        <label>MDA</label>
                        <input type="" placeholder="" name="mda" class="form-control" id="mda" value="{{old('mda')}}" readonly="readonly">
                    </div>
                    <div class="form-group col-lg-12">
                        <label>PURPOSE OF PAYMENT</label>
                        <input type="" placeholder="" name="Service" class="form-control" id="Service" value="{{old('Service')}}" readonly="readonly">
                    </div>
                    
                     <div class="form-group col-lg-12">
                        <label>AMOUNT</label>
                        <input type="" placeholder="" name="amount" class="form-control" id="" value="" required>
                    </div>

                    <div class="form-group col-lg-12">  

                        <label>Choose Bank</label>
                    
                     
                        <select  id="bank" class="form-control" name="bank">
                        <option value="" selected disabled>---</option>
     <?php $linda = App\Channel::where('kind',0)->get(); ?>
 @foreach($linda as $leg)
     <option value="{{ $leg->channel }}" >{{ $leg->channel }}</option>
     
    @endforeach   
                        </select>
                    </div>
                   

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="col-sm-12 text-right" style="margin-top: 23px;">
                    <button  id="zoto" type="submit" style="background: black; box-shadow: none;" class="btn btn-primary">CONFIRM PAYMENT</button> 
                </div> 

                        </form>
                       

</div>
<script type="text/javascript" src="./js/got.js"></script>

</body>
</html>