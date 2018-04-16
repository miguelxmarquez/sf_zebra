<!-- apps/frontend/templates/layout.php -->
<?php require_once('/../../../vendor/qz/src/libs/Formato.php'); ?>

<?php $formato = new Formato($info);?>
<?php $tagg = $formato->generate();?>
<?php $nombre_impresora = 'TSC TTP-244 Pro';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Zebra Print System</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
  </head>
  <script>
        
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
            displayMessage("<strong>Conectado</strong><br/>");
        });

        function findPrinters() {
            qz.printers.find().then(function (data) {
                var list = '';
                for (var i = 0; i < data.length; i++) {
                    list += "&nbsp; " + data[i] + "<br/>";
                }
                displayMessage("<strong>Impresoras disponibles:</strong><br/>" + list);
            }).catch(function (e) {
                console.error(e);
            });
        }

        function displayMessage(msg, css) {
            if (css == undefined) {
                css = 'alert-info';
            }

            var timeout = setTimeout(function () {
                $('#' + timeout).alert('close');
            }, 5000);

            var alert = $("<div/>").addClass('alert alert-dismissible fade in ' + css)
                    .css('max-height', '20em').css('overflow', 'auto')
                    .attr('id', timeout).attr('role', 'alert');
            alert.html("<button type='button' class='close' data-dismiss='alert'>&times;</button>" + msg);

            $("#qz-alert").append(alert);
        }


        function imprimir() {
            var config = qz.configs.create(printer);

            var data = [
                <?php echo $tagg ?>
            ];


            qz.print(config, data).catch(function (e) {
                console.error(e);
            });

        }

    </script>
  <body>
    <div class="w3-display-container">
        <div class="header">
      <div class="content">
        <h2>
          <a href="<?php echo url_for('homepage') ?>">
            <img src="/images/logo-header.png" alt="Zebra Board" />
          </a>
        </h2>
 
      </div>
    </div>
    <div id="qz-alert" style="position: fixed; width: 60%; margin: 0 4% 0 36%; z-index: 900;"></div>
        <button type="button" class="btn btn-default btn-sm" onclick="imprimir();">Ejecutar</button>
        <button type="button" class="btn btn-default btn-sm" onclick="findPrinters();">Buscar las impresoras</button>
    </div>
      <div id="content">
        <div class="content">
          <?php echo $sf_content ?>
        </div>
      </div>
    </br>
    
        <div class="header">
          <div class="menu">
            <div>
              <ul>
                <li><a href="<?php echo url_for('etiqueta/index') ?>">Etiquetas</a></li>
                <li><a href="<?php echo url_for('cliente/index') ?>">Clientes</a></li>
                <li><a href="<?php echo url_for('contacto/index') ?>">Contactos</a></li>
                <li><a href="<?php echo url_for('remitente/index') ?>">Remitentes</a></li>
                <li><a href="<?php echo url_for('plantilla/index') ?>">Plantillas</a></li>

              </ul>
            </div>
          </div>
        </div>
      <div class="footer">
        <div class="content">
          <span class="symfony">
             powered by <a target="_blank" href="http://3creatives.com.co">
            <img src="/images/logo-footer.png" alt="3Creatives" width="90" height="40"/>
            </a>
          </span>
        </div>
      </div>
    
    </div>
  </body>
</html>
