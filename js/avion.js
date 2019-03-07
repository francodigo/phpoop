$(document).ready(function(){
   $("#btn_nuevo").click(function(){       
       window.location.href = "../paginas/nuevoPasajero.php?vuelo=" + $("#vuelo").val();
   });
   $("#btn_aceptar_nuevo").click(function(){
       $("#frm_nuevo_pasajero").submit();
   });
});

