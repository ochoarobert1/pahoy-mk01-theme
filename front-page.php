<?php get_header(); ?>
<?php the_post(); ?>
<main class="container container-body" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
    <div class="row">
        <section id="post-<?php the_ID(); ?>" class="page-container col-12" role="article" itemscope itemtype="http://schema.org/BlogPosting">
            <div class="container">
                <div class="row">
                    <div class="section-container col-12">
                        <?php the_content(); ?>
                    </div>

                    <div class="custom-category-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row align-items-center justify-content-between">
                            <?php for ($i = 1; $i <= 6; $i++) { ?>
                            <div class="custom-category-item col">
                                <div class="custom-category-item-wrapper">
                                    <a href="">
                                        <i class="fa fa-envelope-o"></i>
                                        <h3>Titulo de Categoria</h3>
                                    </a>
                                    <div class="custom-category-counter-elements">
                                        <a href="">
                                            <i class="fa fa-envelope-o"></i>
                                            <h3>13 Elementos</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="custom-title-section col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2>Explore Your Dream Places</h2>
                    </div>

                    <div class="custom-slider-products-section col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="custom-slider-products-owl-carousel owl-carousel owl-theme">
                            <?php for ($i = 1; $i <= 6; $i++) { ?>
                            <div class="custom-slider-product-item">
                                <div class="custom-slider-product-item-wrapper">
                                    <img src="http://placehold.it/200x300" alt="Titulo" class="img-fluid" />
                                    <header class="custom-slider-product-item-info">
                                        <h2>Titulo de Evento</h2>
                                        <div class="custom-slider-product-item-category">
                                            <ul>
                                                <li><a href="">Categoria</a></li>
                                            </ul>
                                            <div class="custom-slider-product-item-price">
                                                $ 200,00
                                            </div>
                                        </div>

                                        <div class="custom-slider-product-item-cta">
                                            <a href="" class="btn btn-md btn-product-item">Agregar al Carrito</a>
                                        </div>
                                    </header>
                                </div>
                            </div>
                            <?php } ?>
                        </div>



                    </div>

                </div>
            </div>
        </section>
    </div>
</main>
<?php get_footer(); ?>
