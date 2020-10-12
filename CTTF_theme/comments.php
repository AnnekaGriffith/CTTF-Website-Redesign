<div class="comments-wrapper">


<div class="comments" id="comments">

    <div class="comments-header">

        <h2 class="comment-reply-title">
        <?php 
            //Get only the approved comments
            $argsargs = array(
               'status' => 'approve'
            );
            
            // The comment Query
            $comments_query = new WP_Comment_Query;
            $comments = $comments_query->query( $args );
            
            // Comment Loop
            if ( $comments ) {
                echo get_comment_count(). "Comments";
                foreach ( $comments as $comment ) {
                    echo '<p>' . $comment->comment_content . '</p>';
                }
                
            }
            else {
                echo 'No comments found.';
            }
        ?>
        </h2><!-- .comments-title -->

    </div><!-- .comments-header -->

    <div class="comments-inner">

       <?php 
            wp_list_comments(
                array(
                    'avatar_size' => 50,
                    'style' => 'div',
                )    
            );
       ?>

    </div><!-- .comments-inner -->

</div><!-- comments -->

<hr class="" aria-hidden="true">

<?php 
    if( comments_open()){
        comment_form(
            array(
                'class_form' => '',
                'title_reply_before' => '<h2 id "reply-title" class="comment-reply-title">',
                'title_reply_after' => '</h2>'
            )
        );
    }
?>

</div>

</div>