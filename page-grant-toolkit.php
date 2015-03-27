<?php get_header(); ?>
<section>
    <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="row">
                <div class="col-sm-12">
                    <?php get_template_part('includes/inc-title'); ?>
                </div>
                <div class="col-sm-8 col-md-9">
                    <?php get_template_part('includes/inc-content'); ?>
                    <?php if( have_rows('files') ): ?>
                        <div class="resources">
                            <?php while ( have_rows('files') ): the_row(); ?>
                                <?php $file = get_sub_field('file'); ?>
                                <a href="<?php print $file['url']; ?>" class="resource">
                                    <h4><span class="resource_type"><?php print substr($file['mime_type'], strpos($file['mime_type'], '/') + 1); ?></span><?php the_sub_field('name'); ?></h4>
                                </a>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-sm-4 col-md-3">
                    <?php if( have_rows('callout_box') ): ?>
                        <?php while ( have_rows('callout_box') ): the_row(); ?>
                            <div class="callout">
                                <h6><?php the_sub_field('title'); ?></h6>
                                <p><?php the_sub_field('body'); ?></p>
                            </div>
                            <a href="<?php the_sub_field('link'); ?>">View <?php the_sub_field('title'); ?> &raquo;</a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; endif; ?>
    </div>
</section>
<?php get_footer(); ?>
