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
</head>
<body>
<input type="button" onclick="tableToExcel('table', 'W3C Example Table')" value="Export to Excel">

<table id="table">
    <thead>
    <tr>
        <td>factura_id</td>
        <td>cliente_id</td>
        <td>nit</td>
        <td>nombre</td>
        <td>contrato_id</td>
        <td>fecha</td>
        <td>detalle</td>
        <td>intereses</td>
        <td>almacenaje</td>
        <td>mora</td>
        <td>subtotal</td>
        <td>descuento</td>
        <td>total</td>
        <td>tipo</td>
        <td>estado</td>
        <td>serie</td>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($facturas->result() as $factura) { ?>

        <tr>
            <td><?php echo $factura->factura_id; ?></td>
            <td><?php echo $factura->id; ?></td>
            <td><?php echo $factura->nit; ?></td>
            <td><?php echo $factura->nombre ; ?></td>
            <td><?php echo $factura->contrato_id; ?></td>
            <td><?php echo $factura->fecha; ?></td>
            <td>
                <table>
                    <?php echo $factura->detalle; ?>
                </table>
            </td>
            <td><?php echo $factura->intereses; ?></td>
            <td><?php echo $factura->almacenaje; ?></td>
            <td><?php echo $factura->mora; ?></td>
            <td><?php echo $factura->subtotal; ?></td>
            <td><?php echo $factura->descuento; ?></td>
            <td><?php echo $factura->total; ?></td>
            <td><?php echo $factura->tipo; ?></td>
            <td><?php echo $factura->estado; ?></td>
            <td><?php echo $factura->serie; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>


<script>


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

