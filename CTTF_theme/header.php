<!DOCTYPE html>
<html lang="en"> 
<head>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CFFT Site Template">
    <meta name="author" content="Anneka Bath">    
    <link rel="shortcut icon" href="/wp-content/themes/CTTF_theme/asset/images/lg_logo.png"> 

    <?php 
    wp_head(); 
    ?>

</head> 

<body>
<div style= "z-index:1000;">
<nav class="navbar navbar-expand-lg navbar-dark">
<a class="site-title pt-lg-4 mb-0" href="index.html"><?php get_bloginfo('name'); ?></a>
        <?php
            if(function_exists('the_custom_logo')){
                $custom_logo_id = get_theme_mod ('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id);
            }
        ?>
        <img class="mb-3 mx-auto logo" src="<?php echo $logo [0] ?>" alt="Children of Tibet logo" >
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapse">
        <span class="navbar-toggler-icon"></span>        
    </button>
        <div class="collapse navbar-collapse" id="navbarcollapse">
        
            <ul class="navbar-nav flex-column text-sm-center text-md-left">    
                <?php /* Primary navigation */
                    wp_nav_menu( array(
                        'menu' => 'primary',
                        'depth' => 2,
                        'container' => '',
                        'menu_class' => 'nav',
                        'item_spacing'=> 'preserve',
                        'item-wrap' => '<li id = "" class = "navbar-nav flex-column ">%3$s</li>'
                        )
                    );
                ?>
            </ul>
	</div>
        <container style="display: inline-block; padding: 5px; right: 0;">            
        <?php dynamic_sidebar( 'home_nav_1'); ?>

        <a style=" margin-left: 15%;" class="btn-a" href="https://www.paypal.com/donate/?token=JUolBJFDWar3BiNAvYiP3yhZGLKuakc773J4tfVUZGB3ZtcrClsy4pAjNgLqFDXsfRrj1870Nf8gKT_v">Donate</a><style="float: right;">
        </container>            
</nav>

</div>

   
</header>
