<?php get_header(); ?>

<main id="main" class="site-main front-page">

    <?php get_template_part( 'template-parts/hero' ); ?>

    <section id="recent-posts">
        <?php get_template_part( 'template-parts/featured-posts' ); ?>
    </section>

    <?php get_template_part( 'template-parts/categories' ); ?>

    <?php get_template_part( 'template-parts/newsletter' ); ?>

</main><!-- #main -->

<?php get_footer(); ?>
