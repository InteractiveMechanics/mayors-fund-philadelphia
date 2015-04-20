<?php get_header(); ?>
<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
    <section class="profile">
        <div class="container">
            <div class="page-header">
                <h5>Our Initiatives</h5>
                <h1><?php the_title(); ?></h1>
    			<h4><?php the_field('short_description'); ?></h4>

                <?php $next = get_next_post(); ?>
                <?php $prev = get_previous_post(); ?>

                <?php if ( $prev ): ?>
                    <a class="arrow left-arrow" href="<?php echo $prev->guid; ?>">
                        <i class="fa fa-angle-left fa-2x"></i>
                        <div class="overlay">
                            <h4><?php echo $prev->post_title; ?></h4>
                            <p><?php echo the_field('short_description', $prev->ID); ?></p>
                        </div>
                    </a>
                <?php endif; ?>
                <?php if ( $next ): ?>
                    <a class="arrow right-arrow" href="<?php echo $next->guid; ?>">
                        <i class="fa fa-angle-right fa-2x"></i>
                        <div class="overlay">
                            <h4><?php echo $next->post_title; ?></h4>
                            <p><?php echo the_field('short_description', $next->ID); ?></p>
                        </div>
                    </a>
                <?php endif; ?>
    		</div>
        	<div class="row">
        		<div class="col-sm-8 col-md-8">
        			<article>
                        <?php if (has_post_thumbnail()): ?>
                            <figure>
                                <?php the_post_thumbnail( 'full' ); ?> 
                                <figcaption><?php the_post_thumbnail_caption(); ?></figcaption>
                            </figure>
                        <?php endif; ?>
                        <?php if( have_rows('blockquote') ): while ( have_rows('blockquote') ): the_row(); ?>
            				<blockquote>
            					<p>"<?php the_sub_field('quote'); ?>"</p>
            					<footer><?php the_sub_field('citation'); ?></footer>
            				</blockquote>
                        <?php endwhile; endif; ?>
        				<?php the_content(); ?>
        			</article>
        		</div>
    			<div class="col-sm-4 col-md-3 col-md-offset-1">
    			    <aside>
                        <?php if( get_field('show_support_button') ): ?>
                            <div class="sidebar-section">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#support"><i class="fa fa-heart"></i> Support this project</a>
                            </div>
                        <?php endif; ?>
                        <?php if( have_rows('video') ): ?>
                            <div class="sidebar-section">
                                <h3>Videos & Media</h3>
                                <?php while ( have_rows('video') ): the_row(); ?>
                                    <a href="<?php the_sub_field('url'); ?>" target="_blank" class="video-img">
                                        <div class="overlay"></div>
                                        <span class="glyphicon glyphicon-facetime-video"></span>
                                        <img src="<?php the_sub_field('image'); ?>" />
                                    </a>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
    
                        <?php
                            $terms = get_the_terms( $post->ID, 'priorities' );
                            if ( $terms && !is_wp_error( $terms ) ) : 
                            	$priorities = array(); ?>
                                <div class="sidebar-section">
                                    <h3>Priority Areas</h3>
                                	<?php foreach ( $terms as $term ): ?>
                                        <a class="icon-container <?php print $term->slug; ?>" href="<?php echo get_post_type_archive_link('initiative'); ?>?priority=<?php echo $term->slug; ?>">
                                    		<div class="icon <?php print $term->slug; ?>"><?php include('svg/icon_' . $term->slug . '.php'); ?></div>
                                            <?php print $term->name; ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                        <?php endif; ?>
    
        				<?php if( have_rows('contact_info') ): ?>
                            <div class="sidebar-section">
                                <h3>Contact Information</h3>
            				    <ul>
                                    <?php while ( have_rows('contact_info') ): the_row(); ?>
                                        <li><a href="<?php the_sub_field('url'); ?>" target="_blank"><?php the_sub_field('title'); ?></a></li>
                                    <?php endwhile; ?>
            				    </ul>
                            </div>
                        <?php endif; ?>
                        <?php if( have_rows('sponsors') ): ?>
                            <div class="sidebar-section">
                                <h3>Sponsors</h3>
                                <?php while ( have_rows('sponsors') ): the_row(); ?>
                                    <a href="<?php the_sub_field('url'); ?>" target="_blank" class="sponsor">
                                        <img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>" title="<?php the_sub_field('title'); ?>" />
                                    </a>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                        <?php if( have_rows('partners') ): ?>
                            <div class="sidebar-section">
                                <h3>Partners</h3>
                                <?php while ( have_rows('partners') ): the_row(); ?>
                                    <a href="<?php the_sub_field('url'); ?>" target="_blank" class="sponsor">
                                        <img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>" title="<?php the_sub_field('title'); ?>" />
                                    </a>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </aside>
    			</div>
        	</div>
        </div>
    </section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
