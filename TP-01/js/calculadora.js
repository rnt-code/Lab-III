$(document).ready(function() {
    /**
     * $(document).ready(function(){}): con document referencio al documento *html, y cuando el documeto esté listo (ready) voy a ejecutar esta *función function. 
    */
    console.log("La página cargó")
    
    $("#num1").focus();

    $("#suma").click(function() {
        console.log("sumando");
        var n1 = $("#num1").val();
        var n2 = $("#num2").val();
        var resultado = parseFloat(n1) + parseFloat(n2);
        presentar(resultado);
        //$("#resultado").val(resultado);
    });

    $("#resta").click(function() {
        console.log("restando");
        
        var n1 = $("#num1").val();
        var n2 = $("#num2").val();
        var resultado = parseFloat(n1) - parseFloat(n2);
        presentar(resultado);
        //$("#resultado").val(resultado);
    });

    $("#multiplicacion").click(function() {
        console.log("multiplicaion");
        
        var n1 = $("#num1").val();
        var n2 = $("#num2").val();
        var resultado = parseFloat(n1) * parseFloat(n2);
        presentar(resultado);
        //$("#resultado").val(resultado);
    });

    $("#division").click(function() {
        var n1 = $("#num1").val();
        var n2 = $("#num2").val();
        var resultado = parseFloat(n1) / parseFloat(n2);
        presentar(resultado);
        //$("#resultado").val(resultado);
    });
    
    $("#borrar").click(function() {
        console.log("borrando...");
        
        $("#num1").val("");
        $("#num2").val("");
        $("#resultado").val("");
        $("#txtres").text("")
        $("#num1").focus();
    });

})

function presentar(resultado) {
    console.log("analizando el resultado de la operación");
    console.log(resultado);

    if(isNaN(resultado)) {
        $("#resultado").val("");
        console.log("no es un número")
        $("#txtres").text("No es un número");
    } 
    else {
        if(resultado == Infinity || resultado == -Infinity) {
            $("#resultado").val("");
            console.log("es número muy grande")
            $("#txtres").text("Es número muy grande");
        }
        else {
            $("#resultado").val(resultado); //envía el resultado al id=resultado
            if(resultado == 0) {
                $("#txtres").text("Cero");
                console.log("Cero");
            }
            else {
                if(resultado > 0) {
                    $("#txtres").text("Positivo");
                    console.log("Positivo");
                }
                else {
                    $("#txtres").text("Negativo");
                    console.log("Negativo");
                }
            }
        }
    }   
}
