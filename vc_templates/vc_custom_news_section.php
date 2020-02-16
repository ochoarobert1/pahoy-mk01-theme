<?php
/* PREVENTS DIRECT ACCESS */
if ( ! defined( 'ABSPATH' ) ) {
    die( 'Silence is Golden' );
}

ob_start();
/* SHORTCODE STRUCTURE  */
?>
<div class="custom-news-section col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="container">
        <div class="row">
            <?php $args = array('post_type' => 'post', 'posts_per_page' => 4, 'order' => 'DESC', 'orderby' => 'date'); ?>
            <?php $array_posts = new WP_Query($args); ?>
            <?php if ($array_posts->have_posts()) : ?>
            <?php while ($array_posts->have_posts()) : $array_posts->the_post(); ?>
            <div class="custom-news-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="custom-news-image">
                    <a href="<?php the_permalink(); ?>" title="<?php _e('Haga click aquí para ver la noticia', 'pahoy'); ?>">
                        <?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
                    </a>
                </div>
                <div class="custom-news-content">
                    <div class="custom-news-categories">
                        <?php $array_cat = get_the_category(); ?>
                        <?php foreach ($array_cat as $item) { ?>
                        <a href="<?php echo get_category_link($item); ?>"><?php echo $item->name; ?></a>
                        <?php } ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" title="<?php _e('Haga click aquí para ver la noticia', 'pahoy'); ?>">
                        <h2><?php the_title(); ?></h2>
                    </a>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_query();?>
        </div>
    </div>
</div>
<?php
/* GET OB_CACHE CONTENT */
$content = ob_get_clean();
/* RETURN SHORTCODE */
return $content;
