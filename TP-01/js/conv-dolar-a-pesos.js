$(document).ready(function() {

    console.log("La página cargó");
    
    $("#dolar").focus();

    $("#convertir").click(function() {
        var pesos;
        var dolar = $("#dolar").val();
        
        dolar = parseFloat(dolar);
        console.log("dolar="+dolar);
        
        pesos = convertir(dolar);
        console.log("pesos="+pesos);
        
        $("#convertido").text(pesos);
    });

});

function convertir(dolar) {
    var pesos;
    
    if(isNaN(dolar)) {
        //document.getElementById("convertido").innerHTML = "";
        return 0;
    }
    else {
        pesos = dolar*142;
        pesos = pesos.toFixed(2);
        //document.getElementById("convertido").innerHTML = "Pesos: $AR " + pesos.toFixed(2);
        return pesos;
    }
};

