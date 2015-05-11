 <!-- http://www.bootstrapzero.com/bootstrap-templates -->
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
            <div class="thumbnail">
              <div class="col-md-4">
                <img class="imageFicheProduit" src="<?php echo $getUnProduitPourFiche->displayImage(); ?>" alt="">
                </div>
                <div class="caption-full clearfix">
                    <h4 class="pull-right"><?php echo formatPrix($getUnProduitPourFiche->prix); ?>€</h4>
                    <h4><a href="#"><?php echo $getUnProduitPourFiche->nom; ?></a>
                    </h4>
                    <p><?php echo $getUnProduitPourFiche->description; ?></p>
                <div class="ratings">
                  <?php foreach ($nombreCommentaires as $key => $value): ?>
                  <p class="pull-right">
                    <?php if ($value->nbCommentaires<=1) {
                     echo $value->nbCommentaires." commentaire";
                    } else {
                      echo $value->nbCommentaires." commentaires";
                    }
                     ?>
                     <?php endforeach ?>          
                    <p><?php foreach ($moyenneCommentaires as $key => $value): ?>
                      <span class="ratyCommentaire" data-number="<?php echo $value->noteMoyenne; ?>"></span>                     
                    <?php endforeach ?>
                    </p>
                </div>
              <!-- Ajouter au Panier -->
             <?php echo form_open("panier/ajout"); ?>    
            <button class="pull-right btn btn-success" type="submit">Ajouter au panier</button> 
             <input class="pull-right form-control" id="inputQuantity" type="number" name="quantity">  
              <span class="pull-right" id="wordQuantity">Quantité</span>
              <input type="hidden" name="idProduit" value="<?php echo $getUnProduitPourFiche->idproduit ?>">
              <?php echo form_close(); ?> 
                </div>
            </div>

                <!-- Laisser un commentaire -->
                <?php echo form_open("produit/ficheProduit/".$getUnProduitPourFiche->idproduit); ?>
            <div class="well">
              <h4>Laisser un commentaire</h4>          
              <!--  Création de champ input à la manière de codeigniter -->
              <?php  echo form_label('Nom');?>
              <?php 
              $data=[
              "name"=>"auteur",
              "placeholder"=>"Entrer votre nom",
              "class"=>"form-control",
              "value"=>set_value("auteur")
              ];
              echo form_input($data);
              ?>
              <!--  FIN Création de champ input à la manière de codeigniter -->
              <?php echo form_error("auteur", '<p></p><div class="alert alert-danger">', '</div>'); ?>
              <p></p>                     
              <div class="form-group">
                <label for="note">Note</label>
                 <div id="raty"></div>
                 <?php echo form_error("note", '<p></p><div class="alert alert-danger">', '</div>'); ?>    
            </div>
            <script type="text/javascript">
              var scoreCommentaire = <?php echo set_value('note',0); ?>;
            </script>          
            <div class="form-group">
                <label for="note">Votre message</label>
                <textarea class="form-control" name="message" id="message" placeholder="Ecivez votre commentaire"><?php echo set_value('message'); ?></textarea>
                 <?php echo form_error("message", '<p></p><div class="alert alert-danger">', '</div>'); ?>
            </div>   
            <button type="submit" class="btn btn-primary">Envoyer</button><br><br>
            <?php echo $this->session->flashdata("successCommentaire") ;?>
            <?php echo form_close(); ?>


          </div>
        <div class="well">

<!--                     <div class="text-right">
                        <a class="btn btn-success">Laisser un commentaire</a>
                    </div> -->


                        <h4>Commentaires</h4>
                        <?php foreach ($allCommentaireById as $key => $value): ?>
                    <hr>
                    <div class="row">                            
                        <div class="col-md-12">
                            <span><?php echo $value->user ?> a posté le <?php echo date('d-m-Y \à\ H:i:s', strtotime($value->dateCommentaire)); ?> :</span><br>
                            <div class="ratyCommentaire" data-number="<?php echo $value->note; ?>"></div>
                            <span><?php echo $value->contenu ?></span><br>
 
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