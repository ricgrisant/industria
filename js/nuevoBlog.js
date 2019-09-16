$(function () {
//alert("Si me cargo al iniciar");
  $(document).on("submit","#Form_InsertarBlog",function(event){
    //alert("Si me llamo al apretar el botón");
    event.preventDefault();

    $.ajax({
        type:"POST",
        url:"class/nuevoBlog.php",
        dataType:"JSON",
        data:$(this).serialize(),
        success:function(data){

        console.log(data);
        if(data[1]=="0"){
          window.location = "db-my-blogs.php";
        }else{
            var msg = data[0]
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

