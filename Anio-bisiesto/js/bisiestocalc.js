$(document).ready(function(){
    console.log("DOM listo para recibir instrucciones");
    //código a ejecutar cuando el DOM está listo para recibir instrucciones

    $("#verificar").click(function() {

        var sanio = $("#anio").val();
        console.log(sanio);
        console.log(sanio.length);
        console.log(!isNaN(sanio));
       
        if(esBisiesto(sanio)) {
           $("#resultado").val("Es año bisiesto")
        }
        else {
            $("#resultado").val("No es año bisiesto")
        }
           
    })

    $("#anio").change(function() {
        $("#resultado").val("")
    });
});

function esBisiesto(sanio) {
    //sanio debe ser un string de 4 caracteres numéricos
    //caso contrario devolverá false y un mensaje por pantalla.

    if((sanio.length == 4) && !isNaN(sanio)) {
        anio = parseInt(sanio);
        if(anio > 0) {
            var remainder4 = anio % 4;
            if(remainder4 != 0) {
                return false;
            }
            else {
                var remainder100 = anio % 100;
                if(remainder100 != 0) {
                    return true;
                }
                else {
                    var remainder400 = anio % 400;
                    if(remainder400 != 0) {
                        return false;
                    }
                }
            }
        } 
        else {
            alert("Debe ser de 4 cifras y solo números");
            return false;
        }
   }
}