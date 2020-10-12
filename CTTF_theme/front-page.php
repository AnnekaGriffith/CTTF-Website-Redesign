<?php
get_header();
?>
    
    
	<article class="content px-3 py-0 p-md-0">
    <?php
        if ( have_posts() ){
            while ( have_posts() ){
                the_post();
                the_content();
            }
        }
    ?>
    </article>
<?php dynamic_sidebar( 'front-page-1'); ?>
<?php
get_footer();
?>