$(document).ready(function(){
    console.log("DOM listo para recibir instrucciones");
    //código a ejecutar cuando el DOM está listo para recibir instrucciones
    
    $("#calcedad").click(function() {

        //Esto me captura un datestring de la fecha de nacimiento, en la forma: yyyy-mm-dd
        var sfnac=$("#fechanacimiento").val();
        console.log("datestring de la Fecha de nac: "+sfnac);

        //Con esto obtengo el objectdate del string 'fecha de nacimiento' 
        ofnac = new Date(sfnac+'T00:00:00-04:00');
        console.log("objeto de la fecha de nacimiento: "+ofnac);

        //Esto me devuelve un objectdate del string 'fecha de hoy'
        var ofhoy = new Date();
        console.log("objeto de la fecha de hoy: "+ofhoy);
        
        /*
        const ny = ofnac.toLocaleString('es-AR', {timeZone: 'America/Argentina/Buenos_Aires'});
        console.log(`Argentina: ${ny}`);
        */

        var anac = ofnac.getFullYear();
        var mnac = ofnac.getMonth() + 1;
        var dnac = ofnac.getDate();
        
        var ahoy = ofhoy.getFullYear();
        var mhoy = ofhoy.getMonth() + 1;
        var dhoy = ofhoy.getDate(); 

        console.log("-------------------")
        console.log("Año de nac: "+anac);
        console.log("Mes de nac: "+mnac);
        console.log("Día de nac: "+dnac);
        console.log("-------------------")
        console.log("Año hoy: "+ahoy);
        console.log("Mes hoy: "+mhoy);
        console.log("Día hoy: "+dhoy);
        console.log("-------------------")

        var edad = calcEdad(dnac, mnac, anac, dhoy, mhoy, ahoy);

        console.log("-------------------")
        console.log("Edad en bruto: "+(ahoy-anac));
        console.log("Edad calculada: "+edad);
        
        $("#edad").val(edad);
    })

    function calcEdad(dnac, mnac, anac, dhoy, mhoy, ahoy) {

        //Edad en bruto
        var edad = ahoy - anac;
        
        if(mhoy > mnac) {
            console.log("'mhoy > mnac' = true")
            return edad;
        }
        else {
            if(mhoy < mnac) {
                console.log("'mhoy < mnac' = true")
                return edad - 1;
            }
            else {
                console.log("'mhoy = mnac' = true")
                if(dhoy > dnac) {
                    console.log("'dhoy > dnac' = true")
                    return edad;
                }
                else {
                    if(dhoy < dnac) {
                        console.log("'dhoy < dnac' = true")
                        return edad - 1;
                    }
                    else {
                        console.log("'dhoy = dnac' = true")
                        return edad;
                    }
                    
                }
            }
        }

    };
});