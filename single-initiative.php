<?php get_header(); ?>
<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
    <section class="single-initiative">
        <div class="container">
            <div class="page-header">
    			<h1><small>Our Initiatives</small></br><?php the_title(); ?></h1>
    			<p class="lead"><?php the_field('short_description'); ?></p>
    		</div>
        	<div class="row">
        		<div class="col-sm-8">
        			<article>
                        <?php if( have_rows('blockquote') ): while ( have_rows('blockquote') ): the_row(); ?>
            				<blockquote>
            					<p>"<?php the_sub_field('quote'); ?>"</p>
            					<footer><?php the_sub_field('citation'); ?></footer>
            				</blockquote>
                        <?php endwhile; endif; ?>
        				<?php the_content(); ?>
        			</article>
        		</div>
    			<aside class="col-sm-3 col-sm-offset-1">
                    <?php if( get_field('url') ): ?>
                        <a href="<?php the_field('url'); ?>" class="btn btn-primary">Support this project</a>
                    <?php endif; ?>
                    <?php if( have_rows('video') ): ?>
                        <div class="sidebar-section">
                            <?php while ( have_rows('video') ): the_row(); ?>
                                <a href="<?php the_sub_field('url'); ?>" target="_blank">
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
                                <ul>
                                	<?php foreach ( $terms as $term ): ?>
                                		<li><?php echo $term->slug; ?></li>
                                    <?php endforeach; ?>
                                </ul>
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
                                <a href="<?php the_sub_field('url'); ?>" target="_blank">
                                    <img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>" title="<?php the_sub_field('title'); ?>" />
                                </a>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
    			</aside>
        	</div>
        </div>
    </section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
