<?php get_header(); ?>

<main id="main" class="site-main">
    <div class="container">

        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e( 'Artigos', 'netrunner' ); ?></h1>
            </header>

            <div class="posts-grid">
                <?php
                while ( have_posts() ) :
                    the_post();
                    get_template_part( 'template-parts/content', get_post_format() );
                endwhile;
                ?>
            </div>

            <?php the_posts_navigation(); ?>

        <?php else : ?>

            <div class="no-results">
                <h2><?php esc_html_e( 'Nenhum post encontrado.', 'netrunner' ); ?></h2>
                <p><?php esc_html_e( 'Tente uma busca ou volte para a página inicial.', 'netrunner' ); ?></p>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
                    <?php esc_html_e( 'Voltar para o início', 'netrunner' ); ?>
                </a>
            </div>

        <?php endif; ?>

    </div><!-- .container -->
</main>

<?php get_footer(); ?>
