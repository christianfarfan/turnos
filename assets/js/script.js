$(document).ready(function(){
      $('#envio-patient').click(function(){
      var datos = $('#datos').serialize();
      $.post({
        type: 'POST',
        url: 'models/add',
        data: datos,
          success: function(r){
          $('#success').html(r);                                   
                                     
          }

        });
                                
        return false;

        });

      
      

});