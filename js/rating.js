$(document).ready(function(){
	$('.starrr').starrr();

	$('.starrr').on('click', '.fa-star', function(event){
    event.preventDefault();
	});

	$("#subComentario").submit(function(event){
		event.preventDefault();
		var rating = $('.starrr .fa-star').length;
    var idEmpresa = $('#idEmpresa').text();
    var opinion = $('#opinion').val();

        if (rating !="" && opinion !="" ) {

            var parametros = `rating=${rating}&opinion=${opinion}&idEmpresa=${idEmpresa}`

            $.ajax({
                  type: "POST",
                  url: "class/nuevaOpinion.php",
                  datatype: "html",
                  data: parametros,
                success:function(data){
                    console.log(data);
                    if(data==1 || data==true){
                        alert('Comentario cargado con exito');
                        location.reload();
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