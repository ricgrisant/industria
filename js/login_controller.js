$(document).ready(function(){
    $("#form1").submit(function(event){
        event.preventDefault();

        var usuario = $("#usr").val();
        var password = $("#psw").val();

        if (usuario !="" && password !="" ) {
            
            var parametros = `psw=${password}&uname=${usuario}`
             
            $.ajax({
                  type: "POST",
                  url: "class/valida_login.php",
                  datatype: "html",
                  data: parametros,
                success:function(data){
                    console.log(data);
                    console.log(data == true);
                    if(data==1){
                        window.location = "db-my-profile.php";
                    }else{
                        var msg = data
                        toastr.options = {
                          "closeButton": true,
                          "debug": false,
                          "newestOnTop": false,
                          "progressBar": true,
                          "positionClass": "toast-top-full-width",
                          "preventDuplicates": true,
                          "onclick": null,
                          "showDuration": "30",
                          "hideDuration": "1000",
                          "timeOut": "5000",
                          "extendedTimeOut": "1000",
                          "showEasing": "swing",
                          "hideEasing": "linear",
                          "showMethod": "fadeIn",
                          "hideMethod": "fadeOut"
                        }
                          toastr.error("ERROR",msg.toUpperCase());
                    }
                },
                error:function(){
                    alert("Ocurrio un error.");
                }
            });

        } else {
         alert("Falta completar al menos uno de los campos");
        }
    });
    
 });
 
 
 