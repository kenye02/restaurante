
<?php 
$this->layout('../templates/layout2',['titulo_pagina'=>'I.E. A.A.C. | Usuarios','titulo'=>'Usuarios','controlador'=>'Usuarios','pagina'=>'Index','usuario'=>$usuario,'email'=>$email])
?>
<?php $this->push('mis_estilos')?>

<?php $this->end()?>

<?php $this->start('contenido')?>
<article class="container-fluid pt-4">
    <div class="row">
        <div class="col-sm-2">
            <a is-modal="true" href="<?= URL.'usuarios/detail' ?>" class="btn btn-warning w-100"><img src="https://img.icons8.com/dotty/80/000000/new-view.png" width="30px" height="30px"/> Nuevo</a>
        </div>
        <div class="col-sm-8">
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
                <th>ID</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Intentos</th>
                <th>Empleados</th>
                <th>F.Actualización</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?> 
                <tr>
                <td><?= $row->usuarioid?></td>
                <td><?= $row->usuario?></td>
                <td><?= $row->email?></td>
                <td><?= $row->contrasena?></td>
                <td><?= $row->intentos?></td>
                <td><?= $row->nombres.' '.$row->empleadoap?></td>
                <td><?= $row->updated_at?></td>
                <td><a is-modal="true" href="<?= URL.'usuarios/detail/'.$row->usuarioid?>" class="btn btn-info btn-sm"><img src="https://img.icons8.com/wired/64/000000/edit-file.png"width="30px" height="30px"/></a>
                <button class="btn btn-danger btn-sm" my-action="<?= URL.'usuarios/delete/'.$row->usuarioid?>" item="<?=$row->usuario?>" onclick="remove(this)"  ><img src="https://img.icons8.com/dotty/80/000000/delete-forever.png" width="30px" height="30px"/></button>
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
<?php $title='EMPLEADO - DETALLE'?>
<?php require_once 'app/views/templates/partials/_myModal.php'?>              
<?php $this->end()?>
<?php $this->push('mis_scripts')?>

<?php $this->end()?>