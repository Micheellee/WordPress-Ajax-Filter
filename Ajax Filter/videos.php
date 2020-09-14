<?php
// Template Name: Videos & Tutorials
the_post();
get_header(); ?>


<section class="video-tutorials" id="video-tutorials">
    <div class="top-header" id="top-header"></div>
    <div class="container">
        <div class="video-tutorials__introduction">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php endwhile; ?>
            <?php endif; ?>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </div>

<!-- Start -->
        <div class="js-filter">
            
            <?php 
$args = array ( 
    'post_type' => 'videos', 
    'posts_per_page' => -1
);

$query = new WP_Query($args);

if($query->have_posts()): 
    while($query->have_posts()) : $query->the_post(); 
    the_title('<h2>','</h2>');
endwhile;
endif;
wp_reset_postdata(); ?>
        </div>

        <div class="categories">
        <a class="js-filter-item"  href="<?php home_url('videos-tutorials');?>">All</a>


            <?php 
            $cat_args = array( 
                'type' => 'videos', 
                'taxonomy' => 'video_category', 
                'orderby' => 'name', 
                'order' => 'ASC' );

$categories = get_categories($cat_args);

foreach($categories as $cat) : ?>

            <a class="js-filter-item" data-category="<?php echo $cat->term_id;?>"
                href="<?php echo get_category_link($cat->term_id);?>"> <?php echo $cat->name;?> </a>

            <?php endforeach; ?>

        </div>
<!--  End -->

    </div>
    </div>
</section>


<?php get_footer(); ?>