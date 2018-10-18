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

        <title>Prep play</title>
        

</head>
<body>

<script type="text/javascript">
            $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
        </script>


<table class="table table-bordered" id="monger" onLoad="codeAddress">

    <thead>
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Completion</th>
            
        </tr>
    </thead>

    <tbody class="searchable" id="monger">
    
      
    </tbody>
</table>


<script type="text/javascript">
	
	function codeAddress(){
		console.log('hello world');
		$.ajax({
		 

		     type:"get",

		     url:'https://jsonplaceholder.typicode.com/todos',
		      data: {
		       
		     
		 },
		     dataType: 'json',
		     success: function(data){
		             console.log(data);

		             var myStringArray = data;
		             var arrayLength = myStringArray.length;
		             for (var i = 0; i < arrayLength; i++) {
		                console.log();
		                $('<tr><td id="">' + myStringArray[i].id + '</td><td id="">' + myStringArray[i].title + '</td><td id="">' +myStringArray[i].completed + '</td>').appendTo('#monger');
		                
		             }
		             
		  
		     },
		            error: function(data){
		              console.log('something went wrong');
		              
		                }
		           
		            })
	
}



        // console.log(vali);
	codeAddress();

</script>
</body>
</html>