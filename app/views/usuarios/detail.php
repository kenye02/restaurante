
            <form id="myFrom" action="<?= URL.'usuarios/save'?>" method="post">
            <input type="hidden" name="id" value="<?= ($data->usuarioid!=null)?$data->usuarioid:'' ?>">
            <div class="row justiy-content-center">
                <div class="col-12 col-lg-3 col-md-6 col-sm-3 ">
                    <div class="form-group">
                        <label for="usuario">Usuario:</label>
                        <input id="usuario" type="text" name="usuario" value="<?=($data->usuario!=null)?$data->usuario:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-6 col-sm-3">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input id="email" type="text" name="email" value="<?= ($data->email!=null)?$data->email:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-6 col-sm-3">
                    <div class="form-group">
                        <label for="contrasena">Contraseña:</label>
                        <input id="contrasena" type="password" name="contrasena" value="<?= ($data->contrasena!=null)?$data->contrasena:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-6 col-sm-3">
                    <div class="form-group">
                        <label for="intentos">Intetos:</label>
                        <input id="intentos" type="text" name="intentos" value="<?= ($data->intentos!=null)?$data->intentos:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="alumnos" name="alumnos" 
                        <?= ($data->alumnos==1? 'checked':'')?> >
                        <label class="form-check-label" for="alumnos" >Alumnos</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="apoderados" name="apoderados" 
                        <?= ($data->apoderados==1? 'checked':'')?> >
                        <label class="form-check-label" for="apoderados" >Apoderados</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="empleados" name="empleados" 
                        <?= ($data->empleados==1? 'checked':'')?> >
                        <label class="form-check-label" for="empleados" >Empleados</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="madres" name="madres" 
                        <?= ($data->madres==1? 'checked':'')?> >
                        <label class="form-check-label" for="madres" >Madres</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="matriculas" name="matriculas" 
                        <?= ($data->matriculas==1? 'checked':'')?> >
                        <label class="form-check-label" for="matriculas" >Matriculas</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="padres" name="padres" 
                        <?= ($data->padres==1? 'checked':'')?> >
                        <label class="form-check-label" for="padres" >Padres</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="traslados" name="traslados" 
                        <?= ($data->traslados==1? 'checked':'')?> >
                        <label class="form-check-label" for="traslados" >Traslado</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="usuarios" name="usuarios" 
                        <?= ($data->usuarios==1? 'checked':'')?> >
                        <label class="form-check-label" for="usuarios" >Usuario</label>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-12 col-sm-12">
                    <label for="empleadoid">Empleado:</label>
                    <select name="empleadoid" id="empleadoid" class="form-control">
                        <?php foreach ($empleado as $row): ?> 
                            <option value="<?= $row->empleadoid?>"
                            <?= ($data->empleadoid==$row->empleadoid)?'selected':'';?>>
                            <?= $row->nombre.' '.$row->apellidos?></option>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
            </form>
