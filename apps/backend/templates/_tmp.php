<?php 

$sf_user->getAttribute('parametros');
// Qz Library ******************************************
require_once('/../../../vendor/qz/src/libs/Formato.php');

    $info = array('nombre' => 'CORRESPONDENCIA ATLAS',
    'contacto' => 'Pablo Perez',
    'cliente' => 'ATLAS S.A.S.',
    'cliente_telf' => '+57 555 5555555',
    'cliente_mail' => 'contacto@atlas.com.con',
    'cliente_dir' => 'Cra. 1, #50-2. Valle del Cauca, Cali',
    'remitente' => '3 Creatives, S.A.S.',
    'remitente_telf' => '+57 (2) 524 5606',
    'remitente_dir' => 'Calle 39N, #4-13B.',
    );

    $impresora = 'TSC TTP-244 Pro';
    $format = new Formato($info);
    $tag = $format->generate();

?>

<script type="text/javascript">

      var printer = "<?php echo $impresora ?>";

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
                <?php echo $tag ?>
            ];
            qz.print(config, data).catch(function (e) {
                console.error(e);
            });
        }

</script>

<body >

<!-- <p onclick="imprimir();">Print Now</p> -->

</body>