$(function () {

  $(document).on("submit","#FormPasswordChange",function(event){
    //alert("llegué acá al tocar el boton");
    event.preventDefault();

    $.ajax({
        type:"POST",
        url:"class/cambiarPassword.php",
        dataType:"JSON",
        data:$(this).serialize(),
        success:function(data){
          var msg = data[0]
         console.log(data);
        if(data[1]=="1"){
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
        }else{
          //alert("se cambio la vaina");
          //$('#modalPasswordChange').modal('hide');
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
              toastr.success("SUCCESS",msg.toUpperCase());
              window.location.assign("class/cerrar_sesion.php");
        }
      }
    });
  });
});

