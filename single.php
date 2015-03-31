<?php get_header(); ?>
<section class="single">
    <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="page-header">
                <h5>Media, Press & Partner News</h5>
                <h1><?php the_title(); ?></h1>
            </div>
            <article>
                <?php the_content(); ?>
                <?php if(get_field('news_link')): ?>
                    <div class="source">(Source: <a href="<?php the_field('news_link'); ?>" target="_blank"><?php the_field('news_link'); ?></a>).</div>
                <?php endif; ?>
            </article>
        <?php endwhile; endif; ?>
    </div>
</section>
<?php get_footer(); ?>
