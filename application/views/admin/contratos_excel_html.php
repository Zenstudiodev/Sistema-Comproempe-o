<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 11/08/2018
 * Time: 6:05 PM
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

<select name="estado" id="estado" multiple>
    <option value="perdido">perdido</option>
    <option value="desempenado">desempenado</option>
    <option value="refrendado">refrendado</option>
    <option value="liquidado_parcial">liquidado_parcial</option>
    <option value="liquidado">liquidado</option>
    <option value="vigente">vigente</option>
    <option value="anulado">anulado</option>
</select>
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

    $muestra_contrato = $contratos->row();
    print_contenido($muestra_contrato);
    ?>


    <?php foreach ($contratos->result() as $contrato) { ?>


        <tr>
            <td><?php echo $contrato->cliente_id; ?></td>
            <td><?php echo $contrato->cliente_id; ?></td>
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
    var estado;
    $("#filtrar").click(function () {
       de = $("#de").val();
       a = $("#a").val();
       estado = encodeURIComponent($("#estado").val());


       if(de != '' && a !=''){
           url = '<?php echo base_url();?>' + 'contrato/contratos_html_excel/' + de + '/' + a;

           window.location.href = url;
       }else{
           de=1;
           a=1;
           url = '<?php echo base_url();?>' + 'contrato/contratos_html_excel/' + de + '/' + a+'/'+estado;

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

