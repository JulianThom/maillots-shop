<!-- http://www.bootstrapzero.com/bootstrap-templates -->
<!-- http://bootswatch.com/ -->
<!-- HEADER -->
<?php $this->load->view('globals/header'); ?>
<!-- Page Content -->
<div class="container">

  <div class="row">
    <!-- SIDEBAR -->
    <?php $this->load->view('globals/sidebar'); ?>  

    <div class="col-md-9">
<?php if(!empty($btnRetour)) : ?>
            <button class="btn btn-default"><a href="<?= $btnRetour; ?>">Retour</a></button>
          <?php endif; ?>
          <p></p>
      <div class="jumbotron">
        <h1><?php echo $getProduitbyMarque[0]->nomMarque; ?></h1>
        <p><?php echo $getProduitbyMarque[0]->descMarque; ?></p>
      </div>

      <div class="row">
        <?php foreach ($getProduitbyMarque as $key => $value): ?>
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
                <?php if ($value->nombreCommentaire<=1) {
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
  <?php $this->load->view('globals/footer'); ?>