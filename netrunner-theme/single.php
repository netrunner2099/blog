<?php get_header(); ?>

<main id="main" class="site-main single-post">

    <?php
    while ( have_posts() ) :
        the_post();
    ?>

    <!-- Barra de progresso de leitura -->
    <div class="reading-progress-bar" id="reading-progress" aria-hidden="true"></div>

    <!-- Imagem destacada full-width -->
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="single-hero">
            <?php the_post_thumbnail( 'netrunner-hero', array( 'class' => 'single-hero-img' ) ); ?>
        </div>
    <?php endif; ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-article' ); ?>>
        <div class="container">

            <!-- Meta do post -->
            <header class="entry-header">
                <?php echo wp_kses_post( netrunner_category_badge() ); ?>
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="entry-meta">
                    <span class="meta-author">
                        <?php
                        printf(
                            /* translators: %s: nome do autor */
                            esc_html__( 'Por %s', 'netrunner' ),
                            '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
                        );
                        ?>
                    </span>
                    <span class="meta-separator" aria-hidden="true">·</span>
                    <time class="meta-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                        <?php echo esc_html( get_the_date() ); ?>
                    </time>
                    <span class="meta-separator" aria-hidden="true">·</span>
                    <span class="meta-reading-time"><?php echo esc_html( netrunner_reading_time() ); ?></span>
                </div>
            </header><!-- .entry-header -->

            <!-- Conteúdo -->
            <div class="entry-content">
                <?php the_content(); ?>
            </div><!-- .entry-content -->

            <!-- Tags -->
            <?php the_tags( '<div class="entry-tags">', ' ', '</div>' ); ?>

            <!-- Compartilhamento -->
            <div class="share-buttons">
                <span class="share-label"><?php esc_html_e( 'Compartilhar:', 'netrunner' ); ?></span>

                <a class="share-btn share-twitter"
                   href="https://twitter.com/intent/tweet?text=<?php echo rawurlencode( get_the_title() ); ?>&url=<?php echo rawurlencode( get_permalink() ); ?>"
                   target="_blank" rel="noopener noreferrer" aria-label="Compartilhar no Twitter/X">
                    <svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18" aria-hidden="true">
                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.746l7.73-8.835L1.254 2.25H8.08l4.261 5.632 5.903-5.632zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                    </svg>
                    Twitter
                </a>

                <a class="share-btn share-linkedin"
                   href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo rawurlencode( get_permalink() ); ?>"
                   target="_blank" rel="noopener noreferrer" aria-label="Compartilhar no LinkedIn">
                    <svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18" aria-hidden="true">
                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                    </svg>
                    LinkedIn
                </a>

                <a class="share-btn share-whatsapp"
                   href="https://wa.me/?text=<?php echo rawurlencode( get_the_title() . ' ' . get_permalink() ); ?>"
                   target="_blank" rel="noopener noreferrer" aria-label="Compartilhar no WhatsApp">
                    <svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18" aria-hidden="true">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/>
                    </svg>
                    WhatsApp
                </a>
            </div><!-- .share-buttons -->

            <!-- Navegação entre posts -->
            <nav class="post-navigation" aria-label="<?php esc_attr_e( 'Navegação entre posts', 'netrunner' ); ?>">
                <?php the_post_navigation( array(
                    'prev_text' => '<span class="nav-direction">' . esc_html__( '← Anterior', 'netrunner' ) . '</span><span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-direction">' . esc_html__( 'Próximo →', 'netrunner' ) . '</span><span class="nav-title">%title</span>',
                ) ); ?>
            </nav>

            <!-- Posts relacionados -->
            <?php
            $categories = get_the_category();
            if ( ! empty( $categories ) ) {
                $related_query = new WP_Query( array(
                    'category__in'   => wp_list_pluck( $categories, 'term_id' ),
                    'posts_per_page' => 3,
                    'post__not_in'   => array( get_the_ID() ),
                    'orderby'        => 'rand',
                ) );

                if ( $related_query->have_posts() ) :
                    ?>
                    <section class="related-posts">
                        <h3 class="section-title"><?php esc_html_e( 'Posts Relacionados', 'netrunner' ); ?></h3>
                        <div class="posts-grid posts-grid--3">
                            <?php
                            while ( $related_query->have_posts() ) :
                                $related_query->the_post();
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
                                        <h4 class="card-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h4>
                                        <div class="card-meta">
                                            <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
                                        </div>
                                    </div>
                                </article>
                            <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </section>
                <?php
                endif;
            }
            ?>

            <!-- Comentários -->
            <?php
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
            ?>

        </div><!-- .container -->
    </article>

    <?php endwhile; ?>

</main><!-- #main -->

<?php get_footer(); ?>
