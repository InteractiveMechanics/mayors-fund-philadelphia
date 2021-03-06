<?php get_header(); ?>
<section class="media">
    <div class="container">
        <div class="page-header">
            <h5>Media</h5>
			<h1>Media, Press & Partner News</h1>
		</div>
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <h3>Press &amp; News</h3>

                <?php $the_query = new WP_Query( array( 'post_type' => 'post', 'paged' => true ) ); ?>

                <?php if ( $the_query->have_posts() ): 
                    while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                        <article class="news-item">
                            <?php if(get_field('news_logo')): ?><img src="<?php the_field('news_logo'); ?>" /><?php endif; ?>
                            <h5><?php the_date('F j, Y'); ?></h5>
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <p><?php the_excerpt(); ?></p>
                        </article>
                    <?php endwhile; ?>
                    <ul class="pagination">
                        <li><?php next_posts_link( 'Older Posts', $the_query->max_num_pages ); ?></li>
                        <li><?php previous_posts_link( 'Newer Posts' ); ?></li>
                    </ul>
                <?php endif;  wp_reset_postdata();?>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="twitter">
                    <h3><i class="fa fa-twitter fa-lg"></i>@MayorsFundPhila</h3>
                    <div id="twitter-feed"></div>
                    <a href="https://twitter.com/mayorsfundphila" target="_blank" class="view-more">View all tweets &#187;</a>

                    <script src="<?php bloginfo('template_directory'); ?>/js/vendor/twitter-fetcher.js"></script>
                    <script type="text/javascript"> 
                        twitterFetcher.fetch('258973530748747776', 'twitter-feed', 3, true, false, false, '', false, handleTweets, false);

                        function handleTweets(tweets){
                            var x = tweets.length;
                            var n = 0;
                            var container = document.getElementById('twitter-feed');
                            
                            console.log(tweets);

                            var html = '<div class="tweets">';
                            while(n < x) {
                                html += '<div class="tweet-wrapper">' + tweets[n] + '</div>';
                                n++;
                            }
                            html += '</div>';
                            container.innerHTML = html;
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
