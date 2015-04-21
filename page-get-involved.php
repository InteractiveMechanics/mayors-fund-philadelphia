<?php get_header(); ?>
<section class="get-involved">
    <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="row">
                <div class="col-sm-12">
                    <?php get_template_part('includes/inc-title'); ?>
                </div>
                <div class="col-sm-12 col-md-8 col-md-offset-2">
                    <?php if( have_rows('blocks') ): ?>
                        <div class="row">
                            <?php while ( have_rows('blocks') ): the_row(); ?>
                                <div class="col-sm-6">
                                    <div class="block <?php the_sub_field('icon'); ?>">
                                        <div class="icon"><i class="fa fa-<?php the_sub_field('icon'); ?>"></i></div>
                                        <h3><?php the_sub_field('title'); ?></h3>
                                        <p><?php the_sub_field('body'); ?></p>
                                        <?php if (get_sub_field('show_donate')): ?>
                                            <a href="#" data-toggle="modal" data-target="#support" class="btn btn-primary btn-block">
                                                <?php the_sub_field('link_text'); ?>&nbsp;&raquo;</a>
                                        <?php else : ?>
                                            <a href="<?php the_sub_field('link_url'); ?>" target="_blank" class="btn btn-primary btn-block">
                                                <?php the_sub_field('link_text'); ?>&nbsp;&raquo;</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <hr/>
                        </div>
                    <?php endif; ?>
                   
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-8">
                            <?php get_template_part('includes/inc-content'); ?>
                        </div>
                        <div class="col-sm-4">
                            <?php if( get_field('contributions')){ the_field('contributions'); } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; endif; ?>
    </div>
</section>
<?php get_footer(); ?>
