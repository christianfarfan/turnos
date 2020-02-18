$(document).ready(function(){
      // envio a guardar pacientes
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

      // envio a editar pacientes
      
      /*Agregando turno a un paciente
      para despues sacar cita
      */
      $('#sacando-turno').click(function(){
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