<?php get_header(); ?>
<section>
    <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="row">
                <div class="col-sm-12">
                    <?php get_template_part('includes/inc-title'); ?>
                    <?php if( get_field('short_desc')){ echo '<h3>' . get_field('short_desc') . '</h3>'; } ?>
                </div>
                <div class="col-sm-12">
                    <?php if( have_rows('blocks') ): ?>
                        <div class="row">
                            <?php while ( have_rows('blocks') ): the_row(); ?>
                                <div class="col-sm-4">
                                    <div class="block">
                                        <div class="icon"><?php the_sub_field('icon'); ?></div>
                                        <h3><?php the_sub_field('title'); ?></h3>
                                        <p><?php the_sub_field('body'); ?></p>
                                        <?php if (get_sub_field('show_donate')): ?>
                                            <a href="#" data-toggle="modal" data-target="#support"><?php the_sub_field('link_text'); ?>&nbsp;&raquo;</a>
                                        <?php else : ?>
                                            <a href="<?php the_sub_field('link_url'); ?>" target="_blank"><?php the_sub_field('link_text'); ?>&nbsp;&raquo;</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <hr/>
                        </div>
                    <?php endif; ?>
                   
                    
                    <div class="row">
                        <div class="col-sm-8 col-md-9">
                            <?php get_template_part('includes/inc-content'); ?>
                        </div>
                        <div class="col-sm-4 col-md-3">
                            <?php if( get_field('contributions')){ the_field('contributions'); } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; endif; ?>
    </div>
</section>
<?php get_footer(); ?>
