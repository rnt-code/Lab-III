$(document).ready(function(){
    console.log("DOM listo para recibir instrucciones");
    //código a ejecutar cuando el DOM está listo para recibir instrucciones
    
    $("#verestado").click(function() {

        var nota1 = parseInt($("#nota1").val());
        var nota2 = parseInt($("#nota2").val());
        var asist = $("#asistencia").val();
        var est = estado(nota1, nota2, asist);

        console.log("Nota 1 = "+nota1);
        console.log("Nota 2 = "+nota2);
        console.log("Asistencia = "+asist);
        console.log("Estado = "+est);

        $("#estado").val(est);

    });

    $("#borrar").click(function() {
        
        $("#nota1").val("");
        $("#nota2").val("");
        $("#asistencia").val("Seleccione el %");
        $("#estado").val("");
    })

    function estado(nota1, nota2, asist) {

        var n1 = parseFloat(nota1);
        var n2 = parseFloat(nota2);
        var as = parseFloat(asist);

        if(isNaN(n1) || isNaN(n2) || isNaN(as)) {
            alert("Datos incompletos o erróneos");
        }
        else {
            if((n1>=1 && n1<=10) && (n2>=1 && n2<=10)) {
                if(as < 60) {
                    return "Libre"
                }
                else {
                    if(n1 >= 4 && n2 >= 4) {
                        return "Regular";
                    }
                    else {
                        if(n1 < 4 || n2 < 4 ) {
                            return "Desaprobado";
                        }
                    }
                }
            }
            else {
                alert("Alguna nota esta fuera de rango");
            }
        }     
    };
});