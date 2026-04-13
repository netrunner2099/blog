<section class="featured-posts-section">
    <div class="container">

        <div class="section-header">
            <h2 class="section-title"><?php esc_html_e( 'Artigos Recentes', 'netrunner' ); ?></h2>
            <p class="section-subtitle"><?php esc_html_e( 'Fique por dentro dos últimos conteúdos sobre tecnologia e segurança digital.', 'netrunner' ); ?></p>
        </div>

        <?php
        $recent_posts = new WP_Query( array(
            'posts_per_page' => 6,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
        ) );

        if ( $recent_posts->have_posts() ) :
        ?>
        <div class="posts-grid">
            <?php
            while ( $recent_posts->have_posts() ) :
                $recent_posts->the_post();
                ?>
                <article class="post-card">

                    <!-- Imagem ou placeholder -->
                    <a class="card-thumb-link" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'netrunner-card', array( 'class' => 'card-thumb', 'loading' => 'lazy', 'alt' => get_the_title() ) ); ?>
                        <?php else : ?>
                            <div class="card-thumb-placeholder">
                                <?php echo netrunner_placeholder_svg(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </div>
                        <?php endif; ?>
                    </a>

                    <div class="card-body">
                        <!-- Badge de categoria -->
                        <?php echo wp_kses_post( netrunner_category_badge() ); ?>

                        <!-- Título -->
                        <h3 class="card-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>

                        <!-- Excerpt -->
                        <p class="card-excerpt"><?php the_excerpt(); ?></p>

                        <!-- Meta -->
                        <div class="card-meta">
                            <time class="meta-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                <?php echo esc_html( get_the_date() ); ?>
                            </time>
                            <span class="meta-separator" aria-hidden="true">·</span>
                            <span class="meta-reading"><?php echo esc_html( netrunner_reading_time() ); ?></span>
                        </div>
                    </div>

                </article>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div><!-- .posts-grid -->

        <div class="section-footer">
            <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: get_post_type_archive_link( 'post' ) ); ?>" class="btn btn-outline btn-lg">
                <?php esc_html_e( 'Ver todos os artigos', 'netrunner' ); ?>
                <span aria-hidden="true"> →</span>
            </a>
        </div>

        <?php else : ?>
            <p class="no-posts"><?php esc_html_e( 'Nenhum artigo publicado ainda.', 'netrunner' ); ?></p>
        <?php endif; ?>

    </div><!-- .container -->
</section><!-- .featured-posts-section -->
