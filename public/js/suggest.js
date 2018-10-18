function Nati(yul){
   $('.search-input').removeClass('loading');
   $('#subtext').html(' <img style="margin:auto; display:block; width:50px; height:50px;" src="img/coat.jpg">'+'<h1 style=" text-align: center">' + yul + '</h1>');
   var id_country = yul;


      var token = $("input[name='_token']").val();
      //if (yul == "Federal Road Safety Commission" || yul =="Federal Inland Revenue Service" || yul == "Federal Ministry of Agriculture" || yul == "Nigerian National Petroleum Corporation") {
      $.ajax({
          url: 'select-ajax/' + id_country,
          
           type:'get',
          data:$(this).serialize(),
          dataType: 'json',
          success: function(data) {
           //  console.log(data);

             $.each( data.options, function( key, value) {
             
             $('#Service').append($('<option>', { value : value }).text(value)); 
       
});
$('#DESCRIPTION').removeClass('hidden');
           
          },error:function(data){
                        console.log('navy');
                  
                    },complete: function(){
                         $('#Service').change(function(){
    $('#DESCRIPTION').removeClass('hidden');
});
                    }
      });
   
}

jQuery(document).ready(function($) {
        
           // Set the Options for "Bloodhound" suggestion engine
           

           var engine = new Bloodhound({
               remote: {
       
                   url: '/mdalist?q=%QUERY%',
                   wildcard: '%QUERY%'
               },
               datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
               queryTokenizer: Bloodhound.tokenizers.whitespace
           });


           $(".search-input").typeahead({
               hint: true,
               highlight: true,
               minLength: 1
           }, {
               source: engine.ttAdapter(),
              displayKey: 'mdatitle',
               // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
               name: 'mdalist',
                templates: {
              suggestion: function (data) {
       return '<div onClick="Nati(\'' + data.mdatitle + '\')" >' + data.mdatitle + '</div>'

            
            }
          }
          });
      });
  