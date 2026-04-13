<?php get_header(); ?>

<main id="main" class="site-main search-page">
    <div class="container">

        <header class="page-header">
            <h1 class="page-title">
                <?php
                printf(
                    /* translators: %s: termo buscado */
                    esc_html__( 'Resultados para: "%s"', 'netrunner' ),
                    '<span>' . esc_html( get_search_query() ) . '</span>'
                );
                ?>
            </h1>
        </header>

        <!-- Campo de busca -->
        <div class="search-form-wrapper">
            <?php get_search_form(); ?>
        </div>

        <?php if ( have_posts() ) : ?>

            <div class="posts-grid">
                <?php
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article class="post-card">
                        <a class="card-thumb-link" href="<?php the_permalink(); ?>">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'netrunner-card', array( 'class' => 'card-thumb', 'loading' => 'lazy' ) ); ?>
                            <?php else : ?>
                                <div class="card-thumb-placeholder" aria-hidden="true">
                                    <?php echo netrunner_placeholder_svg(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </div>
                            <?php endif; ?>
                        </a>
                        <div class="card-body">
                            <?php echo wp_kses_post( netrunner_category_badge() ); ?>
                            <h2 class="card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <p class="card-excerpt"><?php the_excerpt(); ?></p>
                            <div class="card-meta">
                                <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                    <?php echo esc_html( get_the_date() ); ?>
                                </time>
                                <span class="meta-separator" aria-hidden="true">·</span>
                                <span><?php echo esc_html( netrunner_reading_time() ); ?></span>
                            </div>
                        </div>
                    </article>
                <?php
                endwhile;
                ?>
            </div>

            <?php the_posts_pagination( array(
                'prev_text' => '&larr; ' . esc_html__( 'Anterior', 'netrunner' ),
                'next_text' => esc_html__( 'Próxima', 'netrunner' ) . ' &rarr;',
            ) ); ?>

        <?php else : ?>

            <div class="no-results">
                <p>
                    <?php
                    printf(
                        /* translators: %s: termo buscado */
                        esc_html__( 'Nenhum resultado para "%s". Tente outras palavras.', 'netrunner' ),
                        esc_html( get_search_query() )
                    );
                    ?>
                </p>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
                    <?php esc_html_e( 'Voltar ao início', 'netrunner' ); ?>
                </a>
            </div>

        <?php endif; ?>

    </div><!-- .container -->
</main>

<?php get_footer(); ?>
