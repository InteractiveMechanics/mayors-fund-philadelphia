<?php get_header(); ?>
<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
    <section class="hero homepage">
        <div class="hero-mission-statement">
            <div class="container">
                <h1><?php the_field('mission_statement'); ?></h1>
            </div>
        </div>
        <div class="slideshow">
            <?php if( have_rows('hero_slideshow') ): while ( have_rows('hero_slideshow') ): the_row(); ?>
                <div class="slideshow-slide">
                    <img src="<?php the_sub_field('image'); ?>" />

                    <?php $initiatives = get_sub_field('initiative'); ?>
                    <?php if ($initiatives): foreach( $initiatives as $post): ?>
                        <?php setup_postdata($post); ?>
                        <div class="container">
        				    <a href="<?php the_permalink(); ?>" class="slideshow-caption">
                                <h3>Program Spotlight: <?php the_title(); ?></h3>
                                <p><?php the_field('short_description'); ?></p>
        				    </a>
                        </div>
                        <?php wp_reset_postdata(); ?>
                    <?php endforeach; endif; ?>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </section>
    <section class="middle">
        <div role="tabpanel">
            <div class="container text-center">
                <ul class="nav nav-pills" role="tablist">
                    <li role="presentation" class="active"><a href="#our-mayor" aria-controls="our-mayor" role="tab" data-toggle="tab">Our Mayor</a></li>
                    <li role="presentation"><a href="#our-city" aria-controls="our-city" role="tab" data-toggle="tab">Our City</a></li>
                    <li role="presentation"><a href="#our-programs" aria-controls="our-programs" role="tab" data-toggle="tab">Our Programs</a></li>
                    <li role="presentation"><a href="#our-impact" aria-controls="our-impact" role="tab" data-toggle="tab">Our Impact</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="our-mayor"><?php include('includes/inc-our-mayor.php'); ?></div>
                <div role="tabpanel" class="tab-pane fade" id="our-city"></div>
                <div role="tabpanel" class="tab-pane fade" id="our-programs"></div>
                <div role="tabpanel" class="tab-pane fade" id="our-impact"></div>
            </div>
        </div>
    </section>
    <section class="priorities">
        <div class="container">
            <div class="col-sm-4">
                <?php if( have_rows('priorities_section') ): while ( have_rows('priorities_section') ): the_row(); ?>
                    <h3><?php the_sub_field('title'); ?></h3>
                    <p><?php the_sub_field('description'); ?></p>
                    <p><a href="<?php echo get_post_type_archive_link('initiative'); ?>">View our project initiatives.</a></p>
                <?php endwhile; endif; ?>
            </div>
            <?php
                $terms = get_terms( 'priorities', array('hide_empty' => 0) );
                if ( !empty( $terms ) && !is_wp_error( $terms ) ): foreach ( $terms as $term ): ?>
                    <div class="col-sm-4">
                        <a class="priority-block <?php print $term->slug; ?>" href="<?php echo get_post_type_archive_link('initiative'); ?>?priority=<?php echo $term->slug; ?>">
                            <div class="icon <?php print $term->slug; ?>"><?php include('svg/icon_' . $term->slug . '.php'); ?></div>
                            <h3><?php echo $term->name; ?></h3>
                            <p><?php echo $term->description; ?></p>
                        </a>
                    </div>
            <?php endforeach; endif; ?>
        </div>
    </section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
