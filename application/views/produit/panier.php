<!-- http://www.bootstrapzero.com/bootstrap-templates -->
<!-- HEADER -->
<?php $this->load->view('globals/header'); ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <?php $this->load->view('globals/sidebar'); ?>       
        <div class="col-md-9">
<?php if (!empty($getProduitPanier)):?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Vos produits</th>
                        <th>Quantité</th>
                        <th class="text-center">Prix</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                  <?php $totalHT = 0; ?>
                  <?php foreach ($getProduitPanier as $key => $value): ?>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="<?=site_url();?>/produit/ficheProduit/<?= $value->idproduit ?>" id="pullLeft"> <img class="media-object" src="<?php echo $value->displayImage(); ?>" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body" id="mediaBody">
                                <h4 class="media-heading"><a href="<?=site_url();?>/produit/ficheProduit/<?= $value->idproduit ?>"><?php echo $value->nom; ?></a></h4>
                                <h5 class="media-heading"><a href="<?=site_url();?>/produit/detailMarque/<?= $value->marque_idmarque ?>"><?php echo $value->nomMarque; ?></a></h5>
                                <span>Statut : </span><span class="text-success"><strong>En stock</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <a href="<?=site_url();?>/panier/action/down/<?php echo $value->idproduit ?>"><span class="glyphicon glyphicon-minus"></span></a>
                        <span><?php echo $getCookie[$value->idproduit]; ?></span>
                        <a href="<?=site_url();?>/panier/action/up/<?php echo $value->idproduit ?>"><span class="glyphicon glyphicon-plus"></span></a>
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo formatPrix($value->prix); ?>€</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php $prixParQte=($value->prix)*($getCookie[$value->idproduit]); echo formatPrix($prixParQte) ; ?>€</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <a  class="btn btn-danger" href="<?=site_url();?>/panier/action/supprimer/<?php echo $value->idproduit ?>">
                            <span class="glyphicon glyphicon-remove"></span> Supprimer
                        </a></td>
                    </tr>
                    <?php $totalHT+=$prixParQte; ?>

                   <?php endforeach ?>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Total HT</h5></td>
                        <td class="text-right"><h5><strong><?php echo formatPrix($totalHT); ?>€</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>TVA (20%)</h5></td>
                        <td class="text-right"><h5><strong><?php $tva=$totalHT*0.2; echo formatPrix($tva); ?>€</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total TTC</h3></td>
                        <td class="text-right"><h3><strong><?php $totalTTC=$totalHT+$tva; echo formatPrix($totalTTC); ?>€</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <a href="<?=site_url();?>/main"><button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continuer vos achats
                        </button></a></td>
                        <td>
                        <button type="button" class="btn btn-success">
                            Paiement <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
            <?php else: echo "Votre panier est vide.";?>
            <?php endif ?>
        </div>
    </div>
</div>
    <!-- /.container -->

    <div class="container">

        <hr>
        <!-- FOOTER -->
        <?php $this->load->view('globals/footer'); ?>