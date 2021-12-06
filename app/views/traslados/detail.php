
            <form id="myFrom" action="<?= URL.'traslados/save'?>" method="post">
            <input type="hidden" name="id" value="<?= ($data->trasladoid!=null)?$data->trasladoid:'' ?>">
            <div class="row justiy-content-center">
                <div class="col-12 col-lg-4 col-md-6 col-sm-3 ">
                    <div class="form-group">
                        <label for="motivodetraslado">Motivo de Traslado:</label>
                        <input id="motivodetraslado" type="text" name="motivodetraslado" value="<?=($data->motivodetraslado!=null)?$data->motivodetraslado:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-3">
                    <div class="form-group">
                        <label for="codigomodular">Codigo Modular:</label>
                        <input id="codigomodular" type="text" name="codigomodular" value="<?= ($data->codigomodular!=null)?$data->codigomodular:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 col-sm-3">
                    <div class="form-group">
                    <label for="iededestino">I.E. de Destino:</label>
                    <input id="iededestino" type="text"  name="iededestino" value="<?= ($data->iededestino!=null)?$data->iededestino:''?>" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-lg-2 col-md-6 col-sm-4">
                    <div class="form-group">
                    <label for="vbdetraslado">Visto Bueno:</label>
                    <input id="vbdetraslado" type="text"  name="vbdetraslado" value="Diectora" readonly="readonly" class="form-control">
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
                    <select name="empleadoid" id="empleadoid" class="form-control" >
                        <?php foreach ($empleado as $row): ?> 
                            <option value="<?= $row->empleadoid?>"
                            <?= ($data->empleadoid==$row->empleadoid)?'selected':'';?>>
                            <?= $row->nombre.' '.$row->apellidos?></option>
                        <?php endforeach ?>           
                    </select>
                </div>
                <div class="col-lg-2 col-sm-6">
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
