
            <form id="myFrom" action="<?= URL.'madres/save'?>" method="post">
            <input type="hidden" name="id" value="<?= ($data->madreid!=null)?$data->madreid:'' ?>">
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
                    <label for="fnacimiento">Fecha de nacimiento:</label>
                    <input id="fnacimiento" type="text"  name="fnacimiento" value="<?= ($data->fnacimiento!=null)?$data->fnacimiento:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-6 col-sm-3">
                    <div class="form-group">
                    <label for="gradodeinstruccion">Grado de instrucción:</label>
                    <select class="form-control" name="gradodeinstruccion">
                        <option value="Ninguno" <?=($data->gradodeinstruccion=="Ninguno")?'selected':''?>>Ninguno</option>
                        <option value="Inicial" <?=($data->gradodeinstruccion=="Inicial")?'selected':''?>>Inicial</option>
                        <option value="Primaria" <?=($data->gradodeinstruccion=="Primaria")?'selected':''?>>Primaria</option>
                        <option value="Secundaria" <?=($data->gradodeinstruccion=="Secundaria")?'selected':''?>>Secundaria</option>
                        <option value="Superior" <?=($data->gradodeinstruccion=="Superior")?'selected':''?>>Superior</option>
                    </select>
                    </div>
                </div>             
                <div class="col-12 col-lg-3 col-md-6 col-sm-3">
                    <div class="form-group">
                    <label for="ocupacion">Ocupación:</label>
                    <input id="ocupacion" type="text"  name="ocupacion" value="<?= ($data->ocupacion!=null)?$data->ocupacion:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-6 col-sm-4">
                    <div class="form-group">
                    <label for="dni">DNI:</label>
                    <input id="dni" type="text"  name="dni" value="<?= ($data->dni!=null)?$data->dni:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-6 col-sm-3">
                    <div class="form-group">
                    <label for="sexo">Sexo:</label>
                    <select class="form-control" name="sexo">
                        <option value="F" <?=($data->sexo=="F")?'selected':''?>>Femenino</option>
                    </select>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-3">
                    <div class="form-group">
                    <label for="estadocivil">Estado Civil:</label>
                    <select class="form-control" name="estadocivil">
                        <option value="C" <?=($data->estadocivil=="C")?'selected':''?>>Casado(a)</option>
                        <option value="S" <?=($data->estadocivil=="S")?'selected':''?>>Soltero(a)</option>
                        <option value="D" <?=($data->estadocivil=="D")?'selected':''?>>Divorciado(a)</option>
                        <option value="V" <?=($data->estadocivil=="V")?'selected':''?>>Viudo(a)</option>
                    </select>
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
                <div class="col-12 col-lg-8 col-md-6 col-sm-4">
                    <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input id="direccion" type="text"  name="direccion" value="<?= ($data->direccion!=null)?$data->direccion:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="estado" name="estado" 
                        <?= ($data->estado==1? 'checked':'')?> >
                        <label class="form-check-label" for="estado" >Estado</label>
                    </div>
                </div>
            </div>             
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
            </form>
