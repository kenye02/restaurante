
            <form id="myFrom" action="<?= URL.'matriculas/save'?>" method="post">
            <input type="hidden" name="id" value="<?= ($data->matriculaid!=null)?$data->matriculaid:'' ?>">
            <div class="row justiy-content-center">
                <div class="col-12 col-lg-4 col-md-6 col-sm-3 ">
                    <div class="form-group">
                        <label for="fechamatricula">Fecha:</label>
                        <input id="fechamatricula" type="text" name="fechamatricula" value="<?=($data->fechamatricula!=null)?$data->fechamatricula:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-3 ">
                    <div class="form-group">
                        <label for="codigomodular">Codigo Modular:</label>
                        <input id="codigomodular" type="text" name="codigomodular" value="<?=($data->codigomodular!=null)?$data->codigomodular:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-3">
                    <div class="form-group">
                        <label for="nombreie">Nombre IE:</label>
                        <input id="nombreie" type="text" name="nombreie" value="<?= ($data->nombreie!=null)?$data->nombreie:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-3">
                    <div class="form-group">
                    <label for="ugel">UGEL:</label>
                    <input id="ugel" type="text"  name="ugel" value="<?= ($data->ugel!=null)?$data->ugel:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-4">
                    <div class="form-group">
                    <label for="seccion">Sección:</label>
                    <input id="seccion" type="text"  name="seccion" value="Unica" readonly="readonly" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-4">
                    <div class="form-group">
                    <label for="nivel">Nivel:</label>
                    <input id="nivel" type="text"  name="nivel" value="<?= ($data->nivel!=null)?$data->nivel:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-4">
                    <div class="form-group">
                    <label for="grado">Grado:</label>
                    <input id="grado" type="text"  name="grado" value="<?= ($data->grado!=null)?$data->grado:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-4">
                    <div class="form-group">
                    <label for="turno">Turno:</label>
                    <input id="turno" type="text"  name="turno" value="Mañana" readonly="readonly" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-12 col-sm-12">
                    <label for="alumnoid">Alumno:</label>
                    <select name="alumnoid" id="alumnoid" class="form-control">
                        <?php foreach ($alumno as $row): ?> 
                            <option value="<?= $row->alumnoid?>"
                            <?= ($data->alumnoid==$row->alumnoid)?'selected':'';?>>
                            <?= $row->nombre.' '.$row->apellidopaterno.' '.$row->apellidomaterno?></option>
                        <?php endforeach ?>           
                    </select>
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
                <div class="col-lg-6 col-sm-6">
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
