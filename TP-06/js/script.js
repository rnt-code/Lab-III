$(document).ready(function(){
    console.log("DOM listo para recibir instrucciones");
    //código a ejecutar cuando el DOM está listo para recibir instrucciones
    
    //Selección de producto
    $("#prod1").click(function() {
        var select = $("#prod1").val();
        console.log(select);
        if(select != "Seleccionar item") {
            precunit = precioUnitario(select);
            precunit = parseFloat(precunit);
            //console.log(precunit)
            $("#precunit1").val(precunit.toFixed(2));
        }
        else {
            $("#precunit1").val("");
        }
    });

    $("#prod2").click(function() {
        var select = $("#prod2").val();
        if(select != "Seleccionar item") {
            //console.log(select);
            precunit = precioUnitario(select);
            precunit = parseFloat(precunit);
            //console.log(precunit)
            $("#precunit2").val(precunit.toFixed(2));
        }
        else {
            $("#precunit2").val("");
        }
    });

    $("#prod3").click(function() {
        var select = $("#prod3").val();
        if(select != "Seleccionar item") {
            //console.log(select);
            precunit = precioUnitario(select);
            precunit = parseFloat(precunit);
            //console.log(precunit)
            $("#precunit3").val(precunit.toFixed(2));
        }
        else {
            $("#precunit3").val("");
        }
    });
    //Cálculo de los subtotales
    $("#subtotal").click(function() {

        var cant1 = parseInt($("#cant1").val());
        var precunit1 = $("#precunit1").val();
        var subt1 = cant1 * precunit1;
        if(!isNaN(subt1)) {
            $("#subt1").val(subt1.toFixed(2));
        }
        else {
            $("#subt1").val("");
        }
        var cant2 = parseInt($("#cant2").val());
        var precunit2 = $("#precunit2").val();
        var subt2 = cant2 * precunit2;
        if(!isNaN(subt2)) {
            $("#subt2").val(subt2.toFixed(2));
        }
        else {
            $("#subt2").val("");
        }
        var cant3 = parseInt($("#cant3").val());
        var precunit3 = $("#precunit3").val();
        var subt3 = cant3 * precunit3;
        if(!isNaN(subt3)) {
            $("#subt3").val(subt3.toFixed(2));
        }
        else {
            $("#subt3").val("");
        }
    });

    $("#totalb").click(function() {

        var subtl1 = parseFloat($("#subt1").val());
        var subtl2 = parseFloat($("#subt2").val());
        var subtl3 = parseFloat($("#subt3").val());

        var total = subtl1 + subtl2 + subtl3;
        if(!isNaN(total)) {
            $("#total").val(total.toFixed(2));
        }
        else {
            $("#total").val("");
        }

    });
    //Si cambian las cantidades borrar algunos campos
    $("#cant1").change(function() {
        $("#subt1").val("");
        $("#total").val("");
    });

    $("#cant2").change(function() {
        $("#subt2").val("");
        $("#total").val("");
    });

    $("#cant3").change(function() {
        $("#subt3").val("");
        $("#total").val("");
    });
    //Limpiar todos los campos
    $("#reset").click(function() {
        $("#prod1").val("Seleccionar item");
        $("#prod2").val("Seleccionar item");
        $("#prod3").val("Seleccionar item");
        $("#precunit1").val("");
        $("#precunit2").val("");
        $("#precunit3").val("");
        $("#cant1").val("");
        $("#cant2").val("");
        $("#cant3").val("");
        $("#subt1").val("");
        $("#subt2").val("");
        $("#subt3").val("");
        $("#total").val("");
    });
});

//Precios unitarios
function precioUnitario(select) {

    select = parseInt(select);
    switch(select) {
        case 0: 
            return 0;
        case 1:
            return 30000;
        break;
        case 2:
            return 45000;
        break;
        case 3:
            return 50000;
        break;
        case 4:
            return 9000;
        break;
        case 5:
            return 45000;
        break;
        case 6:
            return 5400;
        break;
        case 7:
            return 6700;
        break;
        case 8:
            return 4400;
        break;
    }
}