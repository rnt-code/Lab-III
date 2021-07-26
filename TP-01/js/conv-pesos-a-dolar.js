$(document).ready(function() {

    console.log("La página cargó");

    $("#pesos").focus();
    
    $("#convertir").click(function() {
        var dolar;
        var pesos = $("#pesos").val();
        
        pesos = parseFloat(pesos);
        console.log("pesos="+pesos);
        
        dolar = convertir(pesos);
        console.log("dolar="+dolar);
        
        $("#convertido").text(dolar);
    });

});

function convertir(pesos) {
    var dolar;
    
    if(isNaN(pesos)) {
        //document.getElementById("convertido").innerHTML = "";
        return 0;
    }
    else {
        dolar = pesos/142;
        dolar = dolar.toFixed(2);
        //document.getElementById("convertido").innerHTML = "Pesos: $AR " + pesos.toFixed(2);
        return dolar;
    }
};