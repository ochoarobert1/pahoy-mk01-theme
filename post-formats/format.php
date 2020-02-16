<?php /* POST FORMAT - DEFAULT */ ?>
<?php $defaultatts = array('class' => 'img-fluid', 'itemprop' => 'image'); ?>
<article id="post-<?php the_ID(); ?>" class="the-single col-9 <?php echo join(' ', get_post_class()); ?>" itemscope itemtype="http://schema.org/Article">
    <?php if ( has_post_thumbnail()) : ?>
    <picture>
        <?php the_post_thumbnail('single_img', $defaultargs); ?>
    </picture>
    <?php endif; ?>
    <header>
        <h1 itemprop="name"><?php the_title(); ?></h1>
    </header>
    <div class="meta-container">
        <span class="author" itemprop="author" itemscope itemptype="http://schema.org/Person"><i class="fa fa-user-o"></i> <?php the_author_posts_link(); ?></span> - <time class="date" datetime="<?php echo get_the_time('Y-m-d') ?>" itemprop="datePublished"><i class="fa fa-clock-o"></i> <?php the_time('d-m-Y'); ?></time>
    </div>
    <div class="category-container">
        <?php $terms = get_the_category(); ?>
        <i class="fa fa-folder-o"></i> <?php foreach ($terms as $item) { ?> <a href="<?php echo get_category_link($item); ?>"><?php echo $item->name; ?></a> <?php } ?>
    </div>
    <div class="post-content" itemprop="articleBody">
        <?php the_content() ?>
        <footer>
            <?php wp_link_pages( array(
    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'pahoy' ) . '</span>',
    'after'       => '</div>',
    'link_before' => '<span>',
    'link_after'  => '</span>', ) ); ?>
        </footer>
    </div><!-- .post-content -->
    <meta itemprop="datePublished" datetime="<?php echo get_the_time('Y-m-d') ?>" content="<?php echo get_the_date('i') ?>">
    <meta itemprop="author" content="<?php echo esc_attr(get_the_author()) ?>">
    <meta itemprop="url" content="<?php the_permalink() ?>">
    <?php // if ( comments_open() ) { comments_template(); } ?>
</article> <?php // end article ?>
