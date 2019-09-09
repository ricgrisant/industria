$(function () {
alert("probando");
  $(document).on("submit","#Form_ActualizarPerfil",function(event){
    alert("submit");
    event.preventDefault();

    $.ajax({
        type:"POST",
        url:"class/updatePerfil.php",
        dataType:"JSON",
        data:$(this).serialize(),
        success:function(data){
         //console.log(respuesta);
        if(data[1]==1){
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
      }
    });
  });
});

