
            <form id="myFrom" action="<?= URL.'alumnos/save'?>" method="post">
            <input type="hidden" name="id" value="<?= ($data->alumnoid!=null)?$data->alumnoid:'' ?>">
            <div class="row justiy-content-center">
                <div class="col-12 col-lg-3 col-md-6 col-sm-3 ">
                    <div class="form-group">
                        <label for="nombre">Nombres:</label>
                        <input id="nombre" type="text" name="nombre" value="<?=($data->nombre!=null)?$data->nombre:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-6 col-sm-3">
                    <div class="form-group">
                        <label for="apellidopaterno">Apellido Paterno:</label>
                        <input id="apellidopaterno" type="text" name="apellidopaterno" value="<?= ($data->apellidopaterno!=null)?$data->apellidopaterno:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-6 col-sm-3">
                    <div class="form-group">
                        <label for="apellidomaterno">Apellido Materno:</label>
                        <input id="apellidomaterno" type="text" name="apellidomaterno" value="<?= ($data->apellidomaterno!=null)?$data->apellidomaterno:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-6 col-sm-3">
                    <div class="form-group">
                    <label for="sexo">Sexo:</label>
                    <select class="form-control" name="sexo">
                        <option value="M" <?=($data->sexo=="M")?'selected':''?>>Masculino</option>
                        <option value="F" <?=($data->sexo=="F")?'selected':''?>>Femenino</option>
                    </select>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-3">
                    <div class="form-group">
                    <label for="fnacimiento">Fecha de nacimiento:</label>
                    <input id="fnacimiento" type="text"  name="fnacimiento" value="<?= ($data->fnacimiento!=null)?$data->fnacimiento:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-3">
                    <div class="form-group">
                    <label for="lugarnacimiento">Lugar de nacimiento:</label>
                    <input id="lugarnacimiento" type="text"  name="lugarnacimiento" value="<?= ($data->lugarnacimiento!=null)?$data->lugarnacimiento:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-3">
                    <div class="form-group">
                    <label for="tipodiscapacidad">Tipo de discapacidad:</label>
                    <input id="tipodiscapacidad" type="text"  name="tipodiscapacidad" value="<?= ($data->tipodiscapacidad!=null)?$data->tipodiscapacidad:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-6 col-sm-3">
                    <div class="form-group form-check">
                        <label class="form-check-label" for="certificadodiscapacidad" >Certificado de discapacidad:</label>
                        <input type="checkbox" class="form-check-input" id="certificadodiscapacidad" name="certificadodiscapacidad" 
                        <?= ($data->certificadodiscapacidad==1? 'checked':'')?> >
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-4">
                    <div class="form-group">
                    <label for="dni">DNI:</label>
                    <input id="dni" type="text"  name="dni" value="<?= ($data->dni!=null)?$data->dni:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-5 col-md-6 col-sm-4">
                    <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input id="direccion" type="text"  name="direccion" value="<?= ($data->direccion!=null)?$data->direccion:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-3">
                    <div class="form-group">
                    <label for="telefono">Telefono:</label>
                    <input id="telefono" type="text"  name="telefono" value="<?= ($data->telefono!=null)?$data->telefono:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-3">
                    <div class="form-group">
                    <label for="correo">Correo:</label>
                    <input id="correo" type="text"  name="correo" value="<?= ($data->correo!=null)?$data->correo:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-12 col-sm-12">
                    <label for="apoderadoid">Apoderado:</label>
                    <select name="apoderadoid" id="apoderadoid" class="form-control">
                        <?php foreach ($apoderado as $row): ?> 
                            <option value="<?= $row->apoderadoid?>"
                            <?= ($data->apoderadoid==$row->apoderadoid)?'selected':'';?>>
                            <?= $row->nombre.' '.$row->apellidopaterno.' '.$row->apellidomaterno?></option>
                        <?php endforeach ?>           
                    </select>
                </div>
                <div class="col-12 col-lg-4 col-md-12 col-sm-12">
                    <label for="padreid">Padre:</label>
                    <select name="padreid" id="padreid" class="form-control">
                        <?php foreach ($padre as $row): ?> 
                            <option value="<?= $row->padreid?>"
                            <?= ($data->padreid==$row->padreid)?'selected':'';?>>
                            <?= $row->nombre.' '.$row->apellidopaterno.' '.$row->apellidomaterno?></option>
                        <?php endforeach ?>           
                    </select>
                </div>
                <div class="col-12 col-lg-4 col-md-12 col-sm-12">
                    <label for="madreid">Madre:</label>
                    <select name="madreid" id="madreid" class="form-control">
                        <?php foreach ($madre as $row): ?> 
                            <option value="<?= $row->madreid?>"
                            <?= ($data->madreid==$row->madreid)?'selected':'';?>>
                            <?= $row->nombre.' '.$row->apellidopaterno.' '.$row->apellidomaterno?></option>
                        <?php endforeach ?>           
                    </select>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="estado" name="estado" 
                        <?= ($data->estado==1? 'checked':'')?> >
                        <label class="form-check-label" for="estado" >Estado</label>
                    </div>
                </div>
            </div>
            <div id="error_messages" ></div>             
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
            </form>
