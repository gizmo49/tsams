function murry(equ){
console.log(equ);

 $.ajax({
        

            type:"get",
            url:'/findpac',
             data: {
              'pac': equ, 
            
},
            dataType: 'json',
            success: function(data){

              var sequal = data.data;
              console.log(sequal);
               $.each( sequal, function( key, value) {
      
       $('#' + key ).val(value);
                 
           });
      //         $.each( data, function( key, value) {
      // console.log(key,value);
      //             if (key == "directyu") {
      //                  window.location.replace('/dashboard');
      //             }else{
      //               console.log('other results');
      //             }
      //      });
    

               
            },
            error: function(data){
              console.log('something went wrong');
              
                },complete: function (){
				$('#pac').keydown(function(){
					$("input[name='nameofpayer']").val("");
					$("input[name='mda']").val("");
					$("input[name='Service']").val("");
				
				});
                }
           
            })

}
$('#pac').focusout (
	function () {
		var red = $("input[name='pac']").val();
		murry(red);
	}
	);
// function zoto(){
// $('#zoto').on('click',function(e){
//   e.preventDefault(e);
//   console.log('waaw');
// });
// }
// window.onload = function() {
//         zoto();
// };