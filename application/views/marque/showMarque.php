<!-- http://www.bootstrapzero.com/bootstrap-templates -->
<!-- HEADER -->

<!-- Page Content -->
<div class="container">

    <div class="row">
        <!-- SIDEBAR -->
        <?php $this->load->view('globals/sidebar'); ?>  

<div class="col-xs-12 col-sm-9">

          <p></p>
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1>Nos marques</h1>
            <p>Retrouvez ici toutes les marques de nos maillots.</p>
          </div>
          <div class="row">
                <?php foreach ($allMarques as $key => $value): ?>            
            <div class="col-xs-6 col-lg-4">
              <h2><?php echo $value->nom ?></h2>
              <p><?php echo $value->description ?></p>
              <p><a class="btn btn-default" href="<?=site_url();?>/produit/detailMarque/<?= $value->idmarque ?>" role="button">Voir tous les produits <span class="glyphicon glyphicon-chevron-right"></span> </a></p>
            </div><!--/.col-xs-6.col-lg-4-->
            <?php endforeach ?> 
          </div><!--/row-->
        </div>

    <div class="container">

        <hr>
<!--         On peut supprimer le header et le footer, chargé déjà dans MY_Controller -->
    <!-- FOOTER -->
