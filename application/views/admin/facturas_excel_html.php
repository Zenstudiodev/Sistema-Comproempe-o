<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 13/06/2018
 * Time: 12:48 PM
 */
?>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/ui/admin/plugins/file_saver/FileSaver.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/3.3.13/js/tableexport.js"></script>
    <!-- Moment -->
    <script src="<?php echo base_url(); ?>/ui/admin/plugins/moment/moment-with-locales.js"></script>
</head>
<body>
de | <input type="date" placeholder="de" name="de" id="de" >
a | <input type="date" placeholder="a" name="a" id="a">
<button id="filtrar">filtrar</button>
<br>
<input type="button" onclick="tableToExcel('table', 'W3C Example Table')" value="Export to Excel">

<table id="table" border="1">
    <thead>
    <tr>
        <td>cliente_id</td>
        <td>nit</td>
        <td>nombre</td>
        <td>contrato_id</td>
        <td>fecha</td>
        <td>intereses</td>
        <td>almacenaje</td>
        <td>mora</td>
        <td>Mutuo</td>
        <td>Gatos administrativos</td>
        <td>descuento</td>
        <td>total</td>
        <td>MG</td>
        <td>tipo</td>
        <td>estado</td>
        <td>serie</td>
        <td>detalle</td>
        <td>factura_id</td>
    </tr>
    </thead>
    <tbody>
    <?php

    $total_intereses = 0;
    $total_almacenaje = 0;
    $total_mora = 0;
    $total_mutuo = 0;
    $total_gastos_admministrativos = 0;
    $total_descuento = 0;
    $total_total = 0;
    $promedio_mg= 0;
    ?>

    <?php foreach ($facturas->result() as $factura) { ?>

        <tr>
            <td><?php echo $factura->id; ?></td>
            <td><?php echo $factura->nit; ?></td>
            <td><?php echo $factura->nombre ; ?></td>
            <td><?php echo $factura->contrato_id; ?></td>
            <td><?php echo $factura->fecha; ?></td>
            <td><?php
                $total_intereses = $total_intereses + $factura->intereses;
                echo $factura->intereses; ?></td>
            <td><?php
                $total_almacenaje = $total_almacenaje + $factura->almacenaje;
                echo $factura->almacenaje; ?></td>
            <td><?php
                $total_mora= $total_mora + $factura->mora;
                echo $factura->mora; ?></td>
            <?php $mutuo = $factura->total - $factura->subtotal;?>
            <td><?php
                $total_mutuo= $total_mutuo + $mutuo;
                echo $mutuo ?></td>
            <td><?php
                $total_gastos_admministrativos= $total_gastos_admministrativos + $factura->subtotal;
                echo $factura->subtotal; ?></td>
            <td><?php
                $total_descuento= $total_descuento + $factura->descuento;
                echo $factura->descuento; ?></td>
            <td><?php
                $total_total= $total_total + $factura->total;
                echo $factura->total; ?></td>
            <?php
            if($mutuo != 0){
                $mg = number_format(($factura->subtotal / $mutuo) * 100, 2);
            }else{
                $mg = 0;
            }
             ?>
            <td><?php echo $mg; ?></td>
            <td><?php echo $factura->tipo; ?></td>
            <td><?php echo $factura->estado; ?></td>
            <td><?php echo $factura->serie; ?></td>
            <td>
                <table>
                    <?php echo $factura->detalle; ?>
                    <tr>
                        <td><?php echo $factura->factura_id; ?></td>
                    </tr>
                </table>
            </td>
            <td><?php echo $factura->factura_id; ?></td>
        </tr>
    <?php } ?>
    <tr>
        <td colspan="5">TOTAL</td>
        <td><?php echo formato_dinero($total_intereses);?></td>
        <td><?php echo formato_dinero($total_almacenaje);?></td>
        <td><?php echo formato_dinero($total_mora);?></td>
        <td><?php echo formato_dinero($total_mutuo);?></td>
        <td><?php echo formato_dinero($total_gastos_admministrativos);?></td>
        <td><?php echo formato_dinero($total_descuento);?></td>
        <td><?php echo formato_dinero($total_total);?></td>
        <td><?php
            $promedio_mg = $total_gastos_admministrativos / $total_mutuo;
            echo formato_dinero($promedio_mg);?></td>
        <td colspan="5"> </td>
    </tr>

    </tbody>
</table>


<script>
    var de;
    var a;
    $("#filtrar").click(function () {
       de = $("#de").val();
       a = $("#a").val();

       if(de != '' && a !=''){
           url = '<?php echo base_url();?>' + 'factura/facturas_r_html_excel/' + de + '/' + a;

           window.location.href = url;
       }

    });


    var tableToExcel = (function() {
        var uri = 'data:application/vnd.ms-excel;base64,'
            , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
            , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
            , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
        return function(table, name) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
            window.location.href = uri + base64(format(template, ctx))
        }
    })();


</script>
</body>
</html>

