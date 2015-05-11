<!-- http://www.bootstrapzero.com/bootstrap-templates -->
<!-- http://bootswatch.com/ -->
<!-- HEADER -->

<!-- Page Content -->
<div class="container">

    <div class="row">
        <!-- SIDEBAR -->
        <?php $this->load->view('globals/sidebar'); ?>  

        <div class="col-md-9">

            <div class="row carousel-holder">

                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <?php foreach ($imgSlider as $key => $value): ?>
                            <?php if ($key==0) {
                                echo '<div class="item active"><img class="slide-image" src="'.$value->displayImage().'" alt=""></div>'; 
                            } else {
                                echo '<div class="item"><img class="slide-image" src="'.$value->displayImage().'" alt=""></div>';  
                            }
                            ?>                              
                        <?php endforeach ?>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>

        </div>

        <div class="row">
            <?php foreach ($allProduits as $key => $value): ?>
            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <a href="<?=site_url();?>/produit/ficheProduit/<?= $value->idproduit ?>"><img src="<?php echo $value->displayImage(); ?>" alt=""></a>
                    <div class="caption">
                        <h4 class="pull-right"><?php echo formatPrix($value->prix); ?>€</h4>
                        <h4><a href="<?=site_url();?>/produit/ficheProduit/<?= $value->idproduit ?>"><?php echo $value->nom; ?></a>
                        </h4>
                        <p><?php echo word_limiter($value->description,15); ?></p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">
                            <?php if ($value->nombreCommentaire==1) {
                             echo $value->nombreCommentaire." commentaire";
                         } else {
                          echo $value->nombreCommentaire." commentaires";
                      }
                      ?></p>
                      <p>
                        <span class="ratyCommentaire" data-number="<?php echo $value->noteMoyenne; ?>"></span>
                        
                        <script type="text/javascript">
                        var scoreCommentaire = <?php echo set_value('note',0); ?>;
                        </script>  
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach ?>


</div>

</div>

</div>

</div>
<!-- /.container -->

<div class="container">

    <hr>
    <!-- FOOTER -->
