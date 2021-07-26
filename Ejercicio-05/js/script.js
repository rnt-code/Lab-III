$(document).ready(function(){
    console.log("DOM listo para recibir instrucciones");
    //código a ejecutar cuando el DOM está listo para recibir instrucciones
    
    $("#libro").click(function() {
        
        var select = $("#libro").val();
        console.log(select);
        console.log(situacion(select));

        if(situacion(select) == "Sólo lectura en sala") {
            $("#calcular").attr("disabled", true)
            $("#fechaprestamo").attr("disabled", true)
            
        }
        else {
            $("#calcular").attr("disabled", false)
            $("#fechaprestamo").attr("disabled", false)
            
        }
        if(situacion(select) == "-1") {
            $("#condicion").val("");
            $("#calcular").attr("disabled", true)
            $("#fechaprestamo").attr("disabled", true)
        }
        else {
            $("#condicion").val(situacion(select));
        }
    });

    $("#libro").change(function() {

        $("#fechadevolucion").val("dd-mm-yyyy");
        $("#fechaprestamo").val("dd-mm-yyyy");
    });

    $("#calcular").click(function() {
        
        var sfechaprest = $("#fechaprestamo").val();
        console.log(sfechaprest);
        ofechaprest = new Date(sfechaprest+'T00:00:00-04:00');
        //console.log("objeto de la fecha de préstamo: "+ofechaprest);

        var aprest = ofechaprest.getFullYear();
        var mprest = ofechaprest.getMonth()+1;
        var dprest = ofechaprest.getDate(); 
        
        console.log("día prest: "+dprest);
        console.log("mes prest: "+mprest);
        console.log("año prest: "+aprest);
        
        sfechadev = calcfechadevol(aprest, mprest, dprest);
        //console.log(sfechadev);

        $("#fechadevolucion").val(sfechadev);
    
    });
});

function situacion(select) {
        
    select = parseInt(select);

    switch(select) {

        case 1:
        case 4:
            return "Sólo lectura en sala";
        break;
        
        case 2:
        case 3:
            return "Para préstamo";
        break;
        default:
            return "-1";    
    }
}

function calcfechadevol(aprest, mprest, dprest) {

    aprest = parseInt(aprest);
    mprest = parseInt(mprest);
    dprest = parseInt(dprest);

    if(mprest == 2) {
        //estamos en febrero
        console.log("estamos en febrero");
        saprest = aprest.toString();
        if(esBisiesto(saprest)) {
            //este febrero tiene 29 días
            console.log("esBisiesto(saprest) = "+esBisiesto(saprest))
            console.log("este febrero es bisiesto y tiene 29 días");
            if(dprest >= 25) {
                ddevol = dprest + 5 - 29;
                mdevol = mprest + 1;
                adevol = aprest;
            }
            else {
                ddevol = dprest + 5;
                mdevol = mprest;
                adevol = aprest;
            }
        }
        else {
            //este febrero tiene 28 días
            console.log("este febrero tiene 28 días");
            if(dprest >= 24) {
                ddevol = dprest + 5 - 28;
                mdevol = mprest + 1;
                adevol = aprest;
            }
            else {
                ddevol = dprest + 5;
                mdevol = mprest;
                adevol = aprest;
            }
        }
    }
    else {
        //no estamos en febrero
        console.log("no estamos en febrero");
        if(mprest == 4 || mprest == 6 || mprest == 9 || mprest == 11) {
            //estamos en un mes de 30 días
            console.log("estamos en un mes de 30 días");
            if(dprest >= 26) {
                ddevol = dprest + 5 - 30;
                mdevol = mprest + 1;
                adevol = aprest;
            }
            else {
                ddevol = dprest + 5;
                mdevol = mprest;
                adevol = aprest;
            }
        }
        else {
            //estamos en un mes de 31 días
            console.log("estamos en un mes de 31 días");
            if(mprest != 12) {
                //no estamos en diciembre
                console.log("no estamos en diciembre");
                if(dprest >= 27) {
                    console.log("'dprest >= 27' = true");
                    ddevol = dprest + 5 - 31;
                    mdevol = mprest + 1;
                    adevol = aprest;
                }
                else {
                    ddevol = dprest + 5;
                    mdevol = mprest;
                    adevol = aprest;
                }
            }
            else {
                //estamos en diciembre
                console.log("estamos en diciembre");
                if(dprest >= 27) {
                    ddevol = dprest + 5 - 31;
                    mdevol = 1;
                    adevol = aprest + 1;
                }
                else {
                    ddevol = dprest + 5;
                    mdevol = mprest;
                    adevol = aprest;
                }
            }
        }
    }
    /*
    console.log(ddevol, typeof(ddevol));
    console.log(mdevol, typeof(mdevol));
    console.log(adevol, typeof(adevol));
    */
    adevol = adevol.toString();
    mdevol = mdevol.toString();
    ddevol = ddevol.toString();

    if(ddevol.length < 2) ddevol = "0"+ddevol;
    if(mdevol.length < 2) mdevol = "0"+mdevol;
    
    console.log(ddevol, typeof(ddevol));
    console.log(mdevol, typeof(mdevol));
    console.log(adevol, typeof(adevol));
    
    return adevol+"-"+mdevol+"-"+ddevol;
}

function esBisiesto(sanio) {
    //sanio debe ser un string de 4 caracteres numéricos
    //caso contrario devolverá -1

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
            return -1;
        }
   }
}