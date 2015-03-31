<?php get_header(); ?>
<input type="hidden" value="<?php if(isset($_GET['priority'])){ echo $_GET['priority']; } ?>" id="priority-querystring" />
<section class="initiatives">
    <div class="container">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-8">
                    <h5>Our Initiatives</h5>
                    <h1>Initiatives &amp; Programs</h1>
                </div>
                <div class="col-sm-4">
                    <div class="filters">
                        <p class="filter">Filter by Priority</p>
                        <?php
                            $terms = get_terms( 'priorities', array('hide_empty' => 0) );
                            if ( !empty( $terms ) && !is_wp_error( $terms ) ): foreach ( $terms as $term ): ?>
                                <div class="icon <?php print $term->slug; ?> active" id="<?php echo $term->slug; ?>">
                                    <?php include('svg/icon_' . $term->slug . '.php'); ?>
                                </div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
                <?php $terms = get_the_terms( $post->ID, 'priorities' ); ?>
                <div class="col-sm-6">
                    <a href="<?php the_permalink(); ?>" class="initiative-summary" data-priorities="<?php foreach ( $terms as $term ){ echo $term->slug . ' '; } ?>">
                        <div class="image"><?php the_post_thumbnail( 'full' ); ?></div>
                        <?php foreach ( $terms as $term ): ?>
                            <div class="icon <?php print $term->slug; ?>"><?php include('svg/icon_' . $term->slug . '.php'); ?></div>
                        <?php endforeach; ?>
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_field('short_description'); ?></p>
                    </a>
                </div>
            <?php endwhile; endif; ?>
        </div>
        <div class="row hidden">
            <a class="btn btn-default" href="#" role="button" id="show-more"><h4>View More Programs</h4></a>
        </div>
    </div>
</section>
<?php get_footer(); ?>
