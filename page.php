<?php get_header(); ?>
<section class="page">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php $hero = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'fullsize' ); ?>
        <?php if ( $hero ): ?>
            <section class="hero" style="background: url('<?php echo $hero[0]; ?>')">
                <div class="overlay"></div>
        		<div class="container">
        			<?php get_template_part('includes/inc-title'); ?>
        		</div>
        	</section>
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <?php if ( !$hero ): ?>
                    <div class="col-sm-12">
                        <?php get_template_part('includes/inc-title'); ?>
                    </div>
                <?php endif; ?>
                <div class="col-sm-9 col-md-8"><?php get_template_part('includes/inc-content'); ?></div>
                <div class="col-sm-3 col-md-3 col-md-offset-1">
                    <?php if( have_rows('callout_box') ): ?>
                        <?php while ( have_rows('callout_box') ): the_row(); ?>
                            <div class="callout">
                                <h5><?php the_sub_field('title'); ?></h5>
                                <p><?php the_sub_field('body'); ?></p>
                            </div>
                            <a href="<?php the_sub_field('link'); ?>" class="view-more">View <?php the_sub_field('title'); ?> &raquo;</a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>
