<?php get_header(); ?>

<main id="main" class="site-main page-content">
    <div class="container">

        <?php
        while ( have_posts() ) :
            the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'page-article' ); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <div class="page-thumbnail">
                    <?php the_post_thumbnail( 'netrunner-hero' ); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>

            <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Páginas:', 'netrunner' ),
                'after'  => '</div>',
            ) );
            ?>
        </article>

        <?php endwhile; ?>

    </div><!-- .container -->
</main>

<?php get_footer(); ?>
