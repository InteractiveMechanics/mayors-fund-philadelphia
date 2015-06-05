<?php get_header(); ?>
<section class="page">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php $hero = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'fullsize' ); ?>
        <?php if ( $hero ): ?>
            <section class="hero" style="background-image: url('<?php echo $hero[0]; ?>')">
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
                <div class="col-sm-12 col-md-8">
                    <?php get_template_part('includes/inc-content'); ?>
                    <?php if( have_rows('board') ): ?>
                        <h3>Members of the Board of Directors</h3>
                        <div class="resources">
                            <?php while ( have_rows('board') ): the_row(); ?>
                                <div class="row">
                                    <?php $image = get_sub_field('image'); ?>
                                    <?php $image_thumb = $image['sizes']['thumbnail']; ?>
                                    <div class="col-sm-2"><?php if ($image_thumb){ echo '<img src="' . $image_thumb . '" />'; } ?></div>
                                    <div class="col-sm-10"><?php the_sub_field('bio'); ?></div>
                                </div>
                                <br>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    <?php if( have_rows('staff') ): ?>
                        <h3>Staff</h3>
                        <div class="resources">
                            <?php while ( have_rows('staff') ): the_row(); ?>
                                <div class="row">
                                    <?php $image = get_sub_field('image'); ?>
                                    <?php $image_thumb = $image['sizes']['thumbnail']; ?>
                                    <div class="col-sm-2"><?php if ($image_thumb){ echo '<img src="' . $image_thumb . '" />'; } ?></div>
                                    <div class="col-sm-10"><?php the_sub_field('bio'); ?></div>
                                </div>
                                <br>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 col-lg-3 col-lg-offset-1 hidden-sm hidden-xs">
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
        <?php endwhile; endif; ?>
    </div>
</section>
<?php get_footer(); ?>
