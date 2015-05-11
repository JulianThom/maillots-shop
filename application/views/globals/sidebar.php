<?php 
$sidebarCategoriesClubs=$this->Categorie_model->getCategorieClub();
$sidebarCategoriesChampionnats=$this->Categorie_model->getCategorieChampionnat();
 ?>
<div class="col-md-3">
                <p class="lead">Maillots shop</p>
                <hr>
                <div class="list-group">
                	<h5>Clubs</h5>
                	<?php foreach ($sidebarCategoriesClubs as $key => $value): ?>               		
                    <a href="<?=site_url();?>/categorie/detailProduitByCategorie/<?= $value->idcategorie ?>" class="list-group-item"><?php echo $value->nom ?></a>                                       
                	<?php endforeach ?>
                </div>
				<div class="list-group">
					<hr>
					<h5>Championnats</h5>
                	<?php foreach ($sidebarCategoriesChampionnats as $key => $value): ?>               		
                    <a href="<?=site_url();?>/categorie/detailProduitByCategorie/<?= $value->idcategorie ?>" class="list-group-item"><?php echo $value->nom ?></a>                                       
                	<?php endforeach ?>                                     
                </div>                
            </div>