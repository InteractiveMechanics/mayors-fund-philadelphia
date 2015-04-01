<?php $section = get_the_title($post->post_parent); ?>
<div class="page-header">
    <h5><?php echo $section; ?></h5>
    <h1><?php the_title(); ?></h1>
    <?php if( get_field('short_desc')){ echo '<h4>' . get_field('short_desc') . '</h4>'; } ?>
</div>