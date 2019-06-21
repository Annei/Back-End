$(document).ready(function () {
    $("#login").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type:"POST",
            success:function(){
                swal({
                    title:'Datos no validos',
                    text:'Intente de nuevo',
                    type:'error'
                });
                //imprimo el resultado en el div mensaje que procesa ajax
                //$("#mensaje").html(data);
            }
        });
    });
});
console.log("llego a warning")
