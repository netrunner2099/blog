<section class="categories-section">
    <div class="container">

        <div class="section-header">
            <h2 class="section-title"><?php esc_html_e( 'Explore por Categoria', 'netrunner' ); ?></h2>
            <p class="section-subtitle"><?php esc_html_e( 'Encontre conteúdo sobre os temas que mais interessam você.', 'netrunner' ); ?></p>
        </div>

        <?php
        $categories = get_categories( array(
            'orderby'    => 'count',
            'order'      => 'DESC',
            'hide_empty' => true,
        ) );

        // Ícones SVG e cores por categoria (combinação por nome/slug)
        $category_icons = array(
            'seguranca'   => array( 'icon' => 'shield',   'color' => '#4f46e5' ),
            'segurança'   => array( 'icon' => 'shield',   'color' => '#4f46e5' ),
            'security'    => array( 'icon' => 'shield',   'color' => '#4f46e5' ),
            'otimizacao'  => array( 'icon' => 'speed',    'color' => '#06b6d4' ),
            'otimização'  => array( 'icon' => 'speed',    'color' => '#06b6d4' ),
            'performance' => array( 'icon' => 'speed',    'color' => '#06b6d4' ),
            'backup'      => array( 'icon' => 'backup',   'color' => '#10b981' ),
            'linux'       => array( 'icon' => 'terminal', 'color' => '#f59e0b' ),
            'windows'     => array( 'icon' => 'monitor',  'color' => '#3b82f6' ),
            'redes'       => array( 'icon' => 'network',  'color' => '#8b5cf6' ),
            'network'     => array( 'icon' => 'network',  'color' => '#8b5cf6' ),
            'tutoriais'   => array( 'icon' => 'book',     'color' => '#ec4899' ),
            'tutorials'   => array( 'icon' => 'book',     'color' => '#ec4899' ),
            'dicas'       => array( 'icon' => 'bulb',     'color' => '#f59e0b' ),
            'tips'        => array( 'icon' => 'bulb',     'color' => '#f59e0b' ),
        );

        // Paleta de fallback para categorias sem mapeamento
        $fallback_colors = array( '#4f46e5', '#06b6d4', '#10b981', '#f59e0b', '#8b5cf6', '#ec4899' );

        $svg_icons = array(
            'shield'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>',
            'speed'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>',
            'backup'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>',
            'terminal' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="4 17 10 11 4 5"/><line x1="12" y1="19" x2="20" y2="19"/></svg>',
            'monitor'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
            'network'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="5" r="3"/><circle cx="5" cy="19" r="3"/><circle cx="19" cy="19" r="3"/><line x1="12" y1="8" x2="5.5" y2="16.5"/><line x1="12" y1="8" x2="18.5" y2="16.5"/></svg>',
            'book'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
            'bulb'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="9" y1="18" x2="15" y2="18"/><line x1="10" y1="22" x2="14" y2="22"/><path d="M15.09 14c.18-.98.65-1.74 1.41-2.5A4.65 4.65 0 0 0 18 8 6 6 0 0 0 6 8c0 1 .23 2.23 1.5 3.5A4.61 4.61 0 0 1 8.91 14"/></svg>',
        );

        if ( ! empty( $categories ) ) :
            $color_index = 0;
        ?>
        <div class="categories-grid">
            <?php
            foreach ( $categories as $category ) :
                $slug  = $category->slug;
                $name  = strtolower( $category->name );
                $conf  = isset( $category_icons[ $slug ] ) ? $category_icons[ $slug ]
                       : ( isset( $category_icons[ $name ] ) ? $category_icons[ $name ] : null );
                $icon  = $conf ? $conf['icon'] : 'book';
                $color = $conf ? $conf['color'] : $fallback_colors[ $color_index % count( $fallback_colors ) ];
                $svg   = isset( $svg_icons[ $icon ] ) ? $svg_icons[ $icon ] : $svg_icons['book'];
                $color_index++;
                ?>
                <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"
                   class="category-card"
                   style="--cat-color: <?php echo esc_attr( $color ); ?>">
                    <div class="category-icon">
                        <?php echo $svg; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </div>
                    <h3 class="category-name"><?php echo esc_html( $category->name ); ?></h3>
                    <span class="category-count">
                        <?php
                        printf(
                            /* translators: %d: número de posts */
                            _n( '%d post', '%d posts', $category->count, 'netrunner' ),
                            $category->count
                        );
                        ?>
                    </span>
                </a>
            <?php
            endforeach;
            ?>
        </div><!-- .categories-grid -->

        <?php else : ?>
            <p class="no-categories"><?php esc_html_e( 'Nenhuma categoria encontrada.', 'netrunner' ); ?></p>
        <?php endif; ?>

    </div><!-- .container -->
</section><!-- .categories-section -->
