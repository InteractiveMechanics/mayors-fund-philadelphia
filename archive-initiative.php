<?php get_header(); ?>
<section class="all-initiatives">
    <div class="container">
        <div class="page-header">
			<h1><small>Our Initiatives</small></br>All Initiatives & Programs</h1>
		</div>
        <div class="row">
            <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
                <div class="col-sm-6">
                    <a href="<?php the_permalink(); ?>">
                        <div class="image"><?php the_post_thumbnail( 'full' ); ?></div>
                        <?php
                            $terms = get_the_terms( $post->ID, 'priorities' );
                            if ( $terms && !is_wp_error( $terms ) ) : 
                            	$priorities = array();
                                
                                echo '<ul>';
                            	foreach ( $terms as $term ) {
                            		echo '<li>' . $term->slug . '</li>';
                            	}
                                echo '</ul>';
                            endif;
                        ?>
                        <h2><?php the_title(); ?></h2>
                        <?php the_field('short_description'); ?>
                    </a>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
