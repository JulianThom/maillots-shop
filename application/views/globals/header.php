<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Site e-commerce</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url();?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url();?>/assets/css/shop-homepage.css" rel="stylesheet">
        <link href="<?=base_url();?>/assets/css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand glyphicon glyphicon-home" href="<?=site_url();?>"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                <span class="glyphicon glyphicon-th-list"></span> Nos marques <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu">
                             <li>
                                 <a href="<?=site_url();?>/marque/">Toutes nos marques</a>
                             </li>
                             <li class="divider"></li>
                             <?php
                                
                                $allMarquesForNav=$this->Marque_model->getAllMarquesbyAsc();
                             ?>
                           <?php foreach ($allMarquesForNav as $key => $value): ?>
                             <li>
                                 <a href="<?=site_url();?>/produit/detailMarque/<?= $value->idmarque ?>"><?php echo $value->nom ?></a>
                             </li>                                            
                             <?php endforeach ?>  
                                
                          </ul>
                      </li>
                      <li>
                        <a href="<?=site_url();?>/panier/"><span class="glyphicon glyphicon-shopping-cart"></span> Panier 
                        <?php $getCookie=unserialize(get_cookie("cart"));?>
                         <?php if (!empty($getCookie)) {
                           echo '<span class="badge">'.count($getCookie).'</span></a>';
                        } else {
                          echo '';
                        }
                         ?> </a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-comment"></span> Discussions</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>