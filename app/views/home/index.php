
<?php 
$this->layout('../templates/layout',['titulo_pagina'=>'I.E. A.A.C. | Home','usuario'=>$usuario])
?>
<?php $this->push('mis_estilos')?>

<?php $this->end()?>

<?php $this->start('contenido')?>
<article>
    <!--Carrusel-->
    <section>
        <div id="carouselExampleCaptions" class="carousel slide " data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= constant ('URL');?>public/img/cole.jpg" class="d-block w-100  " alt="..." >
                    <div class="carousel-caption d-none d-md-block">
                        <h5></h5>
                        <p></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?= constant ('URL');?>public/img/c2.jpg" class="d-block w-100 h-100 "  alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5></h5>
                        <p></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?= constant ('URL');?>public/img/c3.jpg" class="d-block w-100 h-100  " alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5></h5>
                        <p></p>
                    </div>
                </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        <!--Acerca de Nosotros-->
        <section class=" " style="background-color:#f0da36">
            <div class="ml-5 mr-5">
                 <div class=" h2 text-center text-dark pt-3 pb-3 font-weight-bolder">Acerca de Nosotros</div>              
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6 col-md-12 col-sm-12 ml-0 mr-0">
                        <div class="text-dark h3 text-center font-weight-bolder">Misión</div>
                        <p class="lead text-justify ml-3 mr-3">Somos una institución educativa líder pedagógicamente comprometidos en el quehacer educativo con clima institucional armonioso y democrático, formando estudiantes con conciencia ambiental y competentes para insertarse a un mundo laboral, con valores calidad humana y cristiana, trabajando a través de un currículo flexible diversificado, integrador, valorativo significativo y participativo, construyendo de esta manera con el desarrollo sostenible de nuestra comunidad.   
                        </p>  
                    </div>
                    <div class="col-12 col-lg-6 col-md-12 col-sm-12 ml-0 mr-0">
                        <div class="text-dark h3 text-center font-weight-bolder">Visión</div>
                        <p class="lead text-justify ml-3 mr-3">La institución educativa N° 20537 “Andrés Avelino Cáceres” – Antioquía al 2021 será una institución que brinde una educación integral de calidad con propuestas curricular propia e innovadora con liderazgo pedagógico, excelencia académica estudiantes formados en valores con cultura y conciencia ambiental, orientados hacia el desarrollo sostenible, democrático, inclusivo, identidad nacional, regional y local; padres de familia comprometidos con la educación y formación de sus hijos con una infraestructura acorde con los avances tecnológicos con apertura a un mundo globalizado a través de proyectos productivos.   
                        </p>
                    </div>
                </div>
            </div>
        </section>   
</article>
<?php $this->stop()?>

<?php $this->push('mis_scripts')?>

<?php $this->end()?>