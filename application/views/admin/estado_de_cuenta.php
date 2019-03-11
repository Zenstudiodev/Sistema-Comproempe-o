<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 12/06/2017
 * Time: 1:50 PM
 */

$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);

if ($cliente) {
    $cliente = $cliente->row();
}

if ($contrato) {
    $contrato = $contrato->row();
}


?>
<!--Css Personalizadoc para vista-->
<?php $this->start('css_p') ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/ui/admin/dist/css/contrato.css"
      type="text/css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/ui/admin/plugins/EasyAutocomplete/easy-autocomplete.min.css"
      type="text/css">
<link rel="stylesheet"
      href="<?php echo base_url(); ?>/ui/admin/plugins/EasyAutocomplete/easy-autocomplete.themes.min.css"
      type="text/css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php base_url() ?>/ui/admin/plugins/datepicker/datepicker3.css">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="invoice">
        <div class="col-xs-12">
            <h2 class="page-header">
                Contratos
            </h2>
        </div>
        <?php if ($contratos) {
            $total_totales = 0;
            ?>
            <div class="row"></div>
            <div class="table-responsive">
                <table id="empeno_contratos_table"
                       class="table table-bordered table-striped display compact nowrap dataTable">
                    <thead>
                    <tr>
                        <th>ID CONTRATO</th>
                        <th>FECHA</th>
                        <th>FECHA DE PAGO</th>
                        <th>ESTADO</th>
                        <th>REFRENDO</th>
                        <th>DESEMPEÑO</th>
                        <th>MUTUO</th>
                        <th>MORA</th>
                        <th>GASTOS DE RECUPERACION</th>
                        <th>TOTAL</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($contratos->result() as $contrato) {
                        if($contrato->estado =='vigente' || $contrato->estado =='gracia' || $contrato->estado =='refrendado' || $contrato->estado =='perdido' || $contrato->estado =='liquidado_parcial'){
                        $pago_contrato = dato_pago_contrato($contrato->contrato_id);
                        $pago_contrato = (object) $pago_contrato;
                       // print_contenido($pago_contrato);
                        ?>

                        <tr>
                            <td style="width: 10%">
                                <?php echo $contrato->contrato_id ?>
                            </td>
                            <td><?php echo $contrato->fecha ?></td>
                            <td><?php echo $contrato->fecha_pago ?></td>
                            <td class="<?php color_por_estaado($contrato->estado); ?>"><?php echo $contrato->estado ?></td>
                            <td><?php echo $contrato->referendo ?></a></td>
                            <td class="contrato_desempeno"><?php echo $contrato->desempeno ?></td>
                            <td class="contrato_mutuo"><?php echo $contrato->total_mutuo ?></td>
                            <td><?php echo $pago_contrato->Mora ?></td>
                            <td><?php echo $pago_contrato->recuperacion ?></td>
                            <td><?php echo $pago_contrato->total;
                                $total_totales = $total_totales + $pago_contrato->total;
                                ?></td>
                        </tr>

                    <?php
                        }
                    } ?>

                    <tr>
                        <td style="width: 10%">
                            <?php echo $contrato->contrato_id ?>
                        </td>
                        <td><?php echo $contrato->fecha ?></td>
                        <td><?php echo $contrato->fecha_pago ?></td>
                        <td class="<?php color_por_estaado($contrato->estado); ?>"><?php echo $contrato->estado ?></td>
                        <td><?php echo $contrato->referendo ?></a></td>
                        <td class="contrato_desempeno"><?php echo $contrato->desempeno ?></td>
                        <td class="contrato_mutuo"><?php echo $contrato->total_mutuo ?></td>
                        <td><?php echo $pago_contrato->Mora ?></td>
                        <td><?php echo $pago_contrato->recuperacion ?></td>
                        <td><?php echo $total_totales;?></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <table class="table">
                <tr>
                    <td>Total a refrendo</td>
                    <td id="total_mutuos"></td>
                </tr>
            </table>
        <?php } ?>
        <hr>
    </section>


</div>
<!-- /.content-wrapper -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>

<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>/ui/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>/ui/admin/plugins/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script>
<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>/ui/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>/ui/admin/plugins/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script>
<script src="<?php echo base_url(); ?>/ui/admin/dist/js/numeros_a_letras.js"></script>

<?php $this->stop() ?>
