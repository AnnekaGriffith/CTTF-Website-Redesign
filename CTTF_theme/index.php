<?php
get_header();
?>
    <?php dynamic_sidebar( 'post-1'); ?>
	<article class="content px-3 py-5 p-md-5">
    <?php
        if ( have_posts() ){
            while ( have_posts()){
                the_post();
                //gets template from template-parts looks for content-archive.php file
                get_template_part( 'template-parts/content', 'archive' );
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            }
        }
    ?>
    
    <?php 
        the_posts_pagination();
    ?>
</article>

<?php
get_footer();
?>

