
<?php 
$this->layout('../templates/layout2',['titulo_pagina'=>'I.E. A.A.C. | Intranet','titulo'=>'Intranet','controlador'=>'Intranet','pagina'=>'Index','usuario'=>$usuario,'email'=>$email])
?>

<?php $this->start('contenido')?>
<article class="container-fluid pt-4">
    <div class="row">
        <div class="col-12"><h3>Institución Educativa Andrés Avelino Cáceres Nº 20537 Antioquia-Huarochiri-Lima</h3></div>
        <div class="col-12">
        <center><img src="<?=URL.'public/img/logo.png'?>" width="400px" height="400px" alt=""></center>
        </div>       
    </div> 
</article>
<?php $this->stop()?>
