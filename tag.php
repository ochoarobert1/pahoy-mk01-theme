<?php get_header(); ?>
<main class="container" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
    <div class="row">
        <div class="page-container col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <div class="row">
                    <div class="title-section col-12">
                        <h1><?php single_term_title(); ?></h1>
                    </div>
                    <?php if (have_posts()) : ?>
                    <section class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <?php $defaultatts = array('class' => 'img-fluid', 'itemprop' => 'image'); ?>
                            <?php while (have_posts()) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" class="archive-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 <?php echo join(' ', get_post_class()); ?>" role="article">
                                <div class="container p-0">
                                    <div class="row">
                                        <picture class="archive-item-pic col-12">
                                            <?php if ( has_post_thumbnail()) : ?>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                <?php the_post_thumbnail('blog_img', $defaultatts); ?>
                                            </a>
                                            <?php else : ?>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                <img itemprop="image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/no-img.jpg" alt="No img" class="img-fluid" />
                                            </a>
                                            <?php endif; ?>
                                        </picture>
                                        <div class="archive-item-info col-12">
                                            <header>
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="archive-item-title">
                                                    <h2 rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h2>
                                                </a>
                                                <div class="meta-container">
                                                    <span class="author" itemprop="author" itemscope itemptype="http://schema.org/Person"><i class="fa fa-user-o"></i> <?php the_author_posts_link(); ?></span> - <time class="date" datetime="<?php echo get_the_time('Y-m-d') ?>" itemprop="datePublished"><i class="fa fa-clock-o"></i> <?php the_time('d-m-Y'); ?></time>
                                                </div>
                                                <div class="category-container">
                                                    <?php $terms = get_the_category(); ?>
                                                    <i class="fa fa-folder-o"></i> <?php foreach ($terms as $item) { ?> <a href="<?php echo get_category_link($item); ?>"><?php echo $item->name; ?></a> <?php } ?>
                                                </div>
                                            </header>
                                            <p><?php the_excerpt(); ?></p>
                                            <a href="<?php the_permalink(); ?>" title="<?php _e('Leer Más', 'pahoy'); ?>" class="btn btn-md btn-dark btn-blog"><?php _e('Continuar Leyendo', 'pahoy'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <?php endwhile; ?>
                        </div>
                        <div class="pagination col-12">
                            <?php if(function_exists('wp_paginate')) { wp_paginate(); } else { posts_nav_link(); wp_link_pages(); } ?>
                        </div>
                    </section>
                    <aside class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 d-xl-block d-lg-block d-md-none d-sm-none d-none">
                        <?php get_sidebar(); ?>
                    </aside>
                    <?php else: ?>
                    <section>
                        <h2><?php _e('Disculpe, su busqueda no arrojo ningun resultado', 'pahoy'); ?></h2>
                        <h3><?php _e('Dirígete nuevamente al', 'pahoy'); ?> <a href="<?php echo home_url('/'); ?>" title="<?php _e('Volver al Inicio', 'pahoy'); ?>"><?php _e('inicio', 'pahoy'); ?></a>.</h3>
                    </section>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
