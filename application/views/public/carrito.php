<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 3/17/2018
 * Time: 1:55 PM
 */

$this->layout('public/public_master_dev',[
    'monstrar_banners' => $monstrar_banners
]);

$ci =& get_instance();
?>



<?php $this->start('page_content') ?>
<div class="container">
    <br>
    <h1>carro de compras</h1>
    <?php echo form_open(base_url().'carrito/actualizar'); ?>

    <table class="table">

        <tr>
            <th>Cantidad</th>
            <th>Descripción de producto</th>
            <th>Descuento</th>
            <th style="text-align:right">Precio producto</th>
            <th style="text-align:right">Sub-Total</th>
        </tr>

        <?php $i = 1; ?>

        <?php foreach ($contenido_carrito as $items): ?>

            <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

            <tr>
                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5', 'class'=>'form-control')); ?></td>
                <td>
                    <?php echo $items['name']; ?>

                    <?php if ($ci->cart->has_options($items['rowid']) == TRUE): ?>

                        <p>
                            <?php foreach ($ci->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?> <?php echo $option_value; ?><br />

                            <?php endforeach; ?>
                        </p>

                    <?php endif; ?>

                </td>
                <td>





                    <input type="text" placeholder="código descuento" class="form-control">
                </td>

                <td style="text-align:right"><?php echo $ci->cart->format_number($items['price']); ?></td>
                <td style="text-align:right">Q.<?php echo $ci->cart->format_number($items['subtotal']); ?></td>
            </tr>

            <?php $i++; ?>

        <?php endforeach; ?>

        <tr>
            <td colspan="2"> </td>
            <td class="right"><strong>Total</strong></td>
            <td class="right">Q.<?php echo $ci->cart->format_number($ci->cart->total()); ?></td>
        </tr>

    </table>

    <p><?php echo form_submit('', 'Actualizar Carrito',array('class'=>'btn btn-info') ); ?></p>

    <div class="row">
        <div class="col">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h2><strong>Políticas de envío</strong></h2>
                <p>You should check in on some of those fields below.</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>

    <p><a class="btn btn-success" href="<?php echo base_url()?>Carrito/formas_pago">Pagar</a></p>
</div>
<?php $this->stop() ?>
