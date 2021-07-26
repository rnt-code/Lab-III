$(document).ready(function(){
    console.log("DOM listo para recibir instrucciones");
    //código a ejecutar cuando el DOM está listo para recibir instrucciones
    
    $("#serie").click(function() {

        var valor = $("#serie").val();
        valor = parseFloat(valor);
        
        console.log("Valor: "+valor);
        
        switch(valor) {

            case 1:
                $("#dia").val("Lunes");
                $("#hora").val("18:00");
            break;
            case 2:
                $("#dia").val("Martes");
                $("#hora").val("19:00");
            break;
            case 3:
                $("#dia").val("Miércoles");
                $("#hora").val("18:00");
            break;
            case 4:
                $("#dia").val("Jueves");
                $("#hora").val("20:00");
            break;  
        }
    })

    $("#serie").change(function() {
        $("#dia").val("");
        $("#hora").val("");
    })
});