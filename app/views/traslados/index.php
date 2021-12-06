
<?php 
$this->layout('../templates/layout2',['titulo_pagina'=>'I.E. A.A.C. | Traslados','titulo'=>'Traslados','controlador'=>'Traslados','pagina'=>'Index','usuario'=>$usuario,'email'=>$email])
?>
<?php $this->push('mis_estilos')?>

<?php $this->end()?>

<?php $this->start('contenido')?>
<article class="container-fluid pt-4">
    <div class="row">
        <div class="col-sm-2">
            <a is-modal="true" href="<?= URL.'traslados/detail'?>" class="btn btn-warning w-100"><img src="https://img.icons8.com/dotty/80/000000/new-view.png" width="30px" height="30px"/> Nuevo</a>
        </div>
        <div class="col-sm-6">
            <div class="form-group row">
                <label for="buscar" class="control-label col-sm-2">Busqueda: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="search" />
                </div>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-info w-100" name="search" value="" > <img src="https://img.icons8.com/pastel-glyph/64/000000/search--v2.png"width="30px" height="30px"/>Buscar</button>
                </div>
            </div>
        </div>
    </div>
    <br />
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Nª Traslado</th>
                <th>Codigo Modular</th>
                <th>I.E De Destino</th>
                <th>Motivo</th>
                <th>VB</th>
                <th>Alumno</th>
                <th>F. Actualización</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?> 
                <tr>
                <td><?= $row->trasladoid?></td>
                <td><?= $row->codigomodular?></td>
                <td><?= $row->iededestino?></td>
                <td><?= $row->motivodetraslado?></td>
                <td><?= $row->vbdetraslado?></td>
                <td><?= $row->alumno.' '.$row->alumnoap.' '.$row->alumnoam?></td>
                <td><?= $row->updated_at?></td>
                <td><a is-modal="true" href="<?= URL.'traslados/detail/'.$row->trasladoid?>" class="btn btn-info btn-sm"><img src="https://img.icons8.com/wired/64/000000/edit-file.png"width="30px" height="30px"/></a>
                <button class="btn btn-danger btn-sm" my-action="<?= URL.'traslados/delete/'.$row->trasladoid?>" item="<?=$row->trasladoid?>" onclick="remove(this)"  ><img src="https://img.icons8.com/dotty/80/000000/delete-forever.png" width="30px" height="30px"/></button>
                </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <br />   
</article>
<?php $this->stop()?>
<?php $this->push('my_modals')?>
<?php $size=GRANDE?>
<?php $title='TRASLADOS - DETALLE'?>
<?php require_once 'app/views/templates/partials/_myModal.php'?>              
<?php $this->end()?>
<?php $this->push('mis_scripts')?>

<?php $this->end()?>