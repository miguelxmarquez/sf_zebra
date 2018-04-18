// web/js/includes.js
$(document).ready(function(){

    $("select").change(function(){

        var opcion = $("select option:selected").text();
        
        if (opcion == "Imprimir") {

            var imprime = confirm("Desea Imprimir las Etiquetas? La seleccion sera enviada a la"+
                                  " impresora Zebra y automaticamente sera creada la plantilla" +
                                  " con los elementos seleccionados");
            if (imprime == true) {
            
                $("#loader").show();
            
                var printer = "<?php echo $nombre_impresora; ?>";
                
                qz.security.setCertificatePromise(function (resolve, reject) {
                    resolve("-----BEGIN CERTIFICATE-----\n" +
                            "MIID/zCCAuegAwIBAgIJAIB8I55QxHjLMA0GCSqGSIb3DQEBCwUAMIGVMQswCQYD\n" +
                            "VQQGEwJDTzEOMAwGA1UECAwFVmFsbGUxDTALBgNVBAcMBENhbGkxFzAVBgNVBAoM\n" +
                            "DjNDcmVhdGl2ZXMgU0FTMQswCQYDVQQLDAJUSTEaMBgGA1UEAwwRZW50b3Jub3By\n" +
                            "dWViYXMuY28xJTAjBgkqhkiG9w0BCQEWFnNvcG9ydGVAM2NyZWF0aXZlcy5jb20w\n" +
                            "HhcNMTcwNjI0MTI1MzI3WhcNMTgwNjI0MTI1MzI3WjCBlTELMAkGA1UEBhMCQ08x\n" +
                            "DjAMBgNVBAgMBVZhbGxlMQ0wCwYDVQQHDARDYWxpMRcwFQYDVQQKDA4zQ3JlYXRp\n" +
                            "dmVzIFNBUzELMAkGA1UECwwCVEkxGjAYBgNVBAMMEWVudG9ybm9wcnVlYmFzLmNv\n" +
                            "MSUwIwYJKoZIhvcNAQkBFhZzb3BvcnRlQDNjcmVhdGl2ZXMuY29tMIIBIjANBgkq\n" +
                            "hkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAn33dhJ3aOPW3kVb8fp5RipeUq/WNO933\n" +
                            "zOc59tRIFy4pqa427hpAmyv1v3BcWv9x7s6Sk8Qe1m+J/wIQWPNkNfBuxCEj0Vr5\n" +
                            "YgAs449Fymj1I6dWugODYi8qQWU/dT453xy2jAMVLJsfWHS9oilpI7WzrRGtkpqX\n" +
                            "yWZ3cXDPSw+xCHsTnV3/rE7NDxk/4pI8FDKY7KBud5/ga6Se2nKGbjybFXXdzG2I\n" +
                            "uafHw2cpTs9jW3jfUe8XXVObxfuHcE9kAHaVb5k4R0xZN3Ty5tD0gQZbQdbUSJKc\n" +
                            "QgawUZoDV6bux2q8xTTBbdZY1nnmb9XqZL9GwRAkvPZG/D4byTtbtwIDAQABo1Aw\n" +
                            "TjAdBgNVHQ4EFgQUkmF0MfHTRKayqYk/MLv69erf/SEwHwYDVR0jBBgwFoAUkmF0\n" +
                            "MfHTRKayqYk/MLv69erf/SEwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQsFAAOC\n" +
                            "AQEAnfipudCs+K7Ts9FwaCDcjD7ciQHPojT8yfLxbT1Qc/mOwMGDdqPEVK6zYwhW\n" +
                            "kxk1vuofdJdL8RSrsAYrMVbFpebVRJHSciAfIeQT19GvGEh5sRDdEcDeoOltnlQ+\n" +
                            "tQbiagwhQCKW2KnXVI4uAhcSFWMINkLUKOC4ajF8ngee3oQDhwBRuGxs27Ik7U62\n" +
                            "XqB5pcUzqYySQ51GNR0eROGQAzfsTuz2t1YOFY82horU1LmM0COyB20yxiIE2DGj\n" +
                            "mub8PwU/x820jlIrLRuu2BYSBYaOmSc+oFpcGQR2jFvtNnASL07d38S4fKVG6mzQ\n" +
                            "Nrx+k/o7D0ueY/h5JFJlNmIuYA==\n" +
                            "-----END CERTIFICATE-----");
                });

                qz.security.setSignaturePromise(function (toSign) {
                    return function (resolve, reject) {
                        $.ajax("signing/sign-message.php?request=" + toSign).then(resolve, reject);
                    };
                });
        
                qz.websocket.connect().then(function () {
                    //alert("Conectado a la Impresora");
                    test();

                });
                
            }
        } 
    });
});