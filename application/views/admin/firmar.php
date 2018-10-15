<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 13/10/2018
 * Time: 3:08 PM
 */

$cliente = $cliente->row();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FIRMAR</title>
    <link rel="shortcut icon" href="/ui/admin/dist/img/favicon.ico">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- firma css -->
    <link rel="stylesheet" href="<?php echo base_url();?>/ui/admin/dist/css/firma.css">
</head>
<body>


<?php
//print_contenido($cliente)
?>
<canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
</div>
<div id="botones">
    <button id="clear" class="borrar">Borrar</button>
    <button id="save" class="guardar">Guardar</button>
</div>
<!-- jQuery 2.2.3 -->
<script src="/ui/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Signature pad-->
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

<script>
    var cliente_id;
    cliente_id = <?php echo $cliente->id; ?>;
    console.log(cliente_id);

    var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
    });
    var saveButton = document.getElementById('save');
    var cancelButton = document.getElementById('clear');

    saveButton.addEventListener('click', function (event) {


        var txt;
        var r = confirm("Al guardar su firma no podra cambiarla");
        if (r == true) {

            var data = signaturePad.toDataURL('image/png');
            var formData = new FormData();
            formData.append('imagen', data);
            formData.append('id_cliente', cliente_id);
            // Send data to server instead...
            // window.open(data);
            $.ajax('<?php echo base_url()?>cliente/guardar_firma', {
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                xhr: function () {
                    var xhr = new XMLHttpRequest();
                    xhr.upload.onprogress = function (e) {
                        var percent = '0';
                        var percentage = '0%';
                        if (e.lengthComputable) {
                            percent = Math.round((e.loaded / e.total) * 100);
                            percentage = percent + '%';
                            // $progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
                        }
                    };
                    return xhr;
                },
                success: function (msg) {
                    console.log(msg);
                    window.close();
                    //$alert.show().addClass('alert-success').text('Upload success');
                },
                error: function () {
                    avatar.src = initialAvatarURL;
                    //$alert.show().addClass('alert-warning').text('Upload error');
                },
                complete: function () {
                    //$progress.hide();
                },
            });
            console.log(data);
        } else {
        }

    });

    cancelButton.addEventListener('click', function (event) {
        signaturePad.clear();
    });





    window.onload = maxWindow;

    function maxWindow() {
        window.moveTo(0, 0);


        if (document.all) {
            top.window.resizeTo(screen.availWidth, screen.availHeight);
        }

        else if (document.layers || document.getElementById) {
            if (top.window.outerHeight < screen.availHeight || top.window.outerWidth < screen.availWidth) {
                top.window.outerHeight = screen.availHeight;
                top.window.outerWidth = screen.availWidth;
            }
        }
    }
</script>

</body>
</html>
