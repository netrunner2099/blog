<?php
/**
 * Netrunner Theme — Functions
 *
 * @package netrunner
 */

// ─── Theme Setup ────────────────────────────────────────────────────────────

function netrunner_setup() {
    // Suporte a tradução
    load_theme_textdomain( 'netrunner', get_template_directory() . '/languages' );

    // Links automáticos de feed no <head>
    add_theme_support( 'automatic-feed-links' );

    // Título gerenciado pelo WordPress
    add_theme_support( 'title-tag' );

    // Imagens destacadas
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'netrunner-card', 800, 450, true );
    add_image_size( 'netrunner-hero', 1200, 600, true );

    // Logo customizado
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Suporte ao editor de blocos (Gutenberg)
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );

    // HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Menus de navegação
    register_nav_menus( array(
        'primary' => __( 'Menu Principal', 'netrunner' ),
        'footer'  => __( 'Menu Rodapé', 'netrunner' ),
    ) );
}
add_action( 'after_setup_theme', 'netrunner_setup' );

// ─── Widget Areas ────────────────────────────────────────────────────────────

function netrunner_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Barra Lateral', 'netrunner' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Adicione widgets na barra lateral.', 'netrunner' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Rodapé', 'netrunner' ),
        'id'            => 'footer-1',
        'description'   => __( 'Widgets do rodapé.', 'netrunner' ),
        'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'netrunner_widgets_init' );

// ─── Enqueue Styles & Scripts ────────────────────────────────────────────────

function netrunner_scripts() {
    $theme_version = wp_get_theme()->get( 'Version' );
    $template_uri  = get_template_directory_uri();

    // Google Fonts — Inter
    wp_enqueue_style(
        'netrunner-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap',
        array(),
        null
    );

    // CSS principal
    wp_enqueue_style(
        'netrunner-main',
        $template_uri . '/assets/css/main.css',
        array( 'netrunner-fonts' ),
        $theme_version
    );

    // CSS dark mode
    wp_enqueue_style(
        'netrunner-dark-mode',
        $template_uri . '/assets/css/dark-mode.css',
        array( 'netrunner-main' ),
        $theme_version
    );

    // JS principal
    wp_enqueue_script(
        'netrunner-main',
        $template_uri . '/assets/js/main.js',
        array(),
        $theme_version,
        true
    );

    // JS dark mode
    wp_enqueue_script(
        'netrunner-dark-mode',
        $template_uri . '/assets/js/dark-mode.js',
        array(),
        $theme_version,
        true
    );

    // Comentários
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'netrunner_scripts' );

// ─── Tempo de leitura estimado ────────────────────────────────────────────────

function netrunner_reading_time( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }
    $content    = get_post_field( 'post_content', $post_id );
    $word_count = str_word_count( wp_strip_all_tags( $content ) );
    $minutes    = max( 1, (int) ceil( $word_count / 200 ) );

    /* translators: %d: número de minutos */
    return sprintf( _n( '%d min de leitura', '%d min de leitura', $minutes, 'netrunner' ), $minutes );
}

// ─── Excerpt personalizado — 150 caracteres ──────────────────────────────────

function netrunner_excerpt_length( $length ) {
    return 30; // palavras (~150 chars)
}
add_filter( 'excerpt_length', 'netrunner_excerpt_length', 999 );

function netrunner_excerpt_more( $more ) {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'netrunner_excerpt_more' );

// ─── Utilitário: badge de categoria ─────────────────────────────────────────

function netrunner_category_badge( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }
    $categories = get_the_category( $post_id );
    if ( empty( $categories ) ) {
        return '';
    }
    $cat = $categories[0];
    return sprintf(
        '<a class="category-badge" href="%s">%s</a>',
        esc_url( get_category_link( $cat->term_id ) ),
        esc_html( $cat->name )
    );
}

// ─── SVG placeholder para posts sem imagem destacada ─────────────────────────

function netrunner_placeholder_svg() {
    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 250" width="400" height="250" aria-hidden="true">
        <rect width="400" height="250" fill="transparent"/>
        <!-- Documento / artigo -->
        <rect x="140" y="40" width="120" height="160" rx="10" fill="var(--color-primary)" opacity=".12"/>
        <rect x="140" y="40" width="120" height="160" rx="10" fill="none" stroke="var(--color-primary)" stroke-width="2" opacity=".3"/>
        <!-- Linhas de texto -->
        <rect x="160" y="70"  width="80" height="8" rx="4" fill="var(--color-primary)" opacity=".5"/>
        <rect x="160" y="90"  width="60" height="6" rx="3" fill="var(--color-text)"    opacity=".2"/>
        <rect x="160" y="106" width="70" height="6" rx="3" fill="var(--color-text)"    opacity=".2"/>
        <rect x="160" y="122" width="55" height="6" rx="3" fill="var(--color-text)"    opacity=".2"/>
        <rect x="160" y="145" width="80" height="6" rx="3" fill="var(--color-text)"    opacity=".15"/>
        <rect x="160" y="161" width="65" height="6" rx="3" fill="var(--color-text)"    opacity=".15"/>
        <!-- Ícone de artigo no topo -->
        <circle cx="200" cy="52" r="12" fill="var(--color-primary)" opacity=".2"/>
        <text x="200" y="57" text-anchor="middle" font-size="12" fill="var(--color-primary)" font-family="sans-serif">✍</text>
    </svg>';
}

// ─── Adicionar classe ao body para dark mode via JS ──────────────────────────

function netrunner_body_classes( $classes ) {
    if ( is_singular() ) {
        $classes[] = 'single-post-page';
    }
    return $classes;
}
add_filter( 'body_class', 'netrunner_body_classes' );

// ─── Menu de fallback (header) ────────────────────────────────────────────────

function netrunner_fallback_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Início', 'netrunner' ) . '</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/categorias' ) ) . '">' . esc_html__( 'Categorias', 'netrunner' ) . '</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/sobre' ) ) . '">' . esc_html__( 'Sobre', 'netrunner' ) . '</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/contato' ) ) . '">' . esc_html__( 'Contato', 'netrunner' ) . '</a></li>';
    echo '</ul>';
}

// ─── Menu de fallback (footer) ────────────────────────────────────────────────

function netrunner_footer_fallback_menu() {
    echo '<ul class="footer-nav-menu">';
    $links = array(
        __( 'Início', 'netrunner' )                  => home_url( '/' ),
        __( 'Sobre', 'netrunner' )                   => home_url( '/sobre' ),
        __( 'Contato', 'netrunner' )                 => home_url( '/contato' ),
        __( 'Política de Privacidade', 'netrunner' ) => home_url( '/politica-de-privacidade' ),
    );
    foreach ( $links as $label => $url ) {
        echo '<li><a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a></li>';
    }
    echo '</ul>';
}
