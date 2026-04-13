<?php get_header(); ?>

<main id="main" class="site-main error-page">
    <div class="container">
        <div class="error-content">

            <!-- Ilustração unDraw — Pessoa perdida / mapa -->
            <div class="error-illustration" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 880 540" width="420" height="260">
                    <!-- Background shapes -->
                    <ellipse cx="440" cy="480" rx="380" ry="40" fill="var(--color-border)" opacity=".5"/>

                    <!-- Map / ground -->
                    <rect x="160" y="280" width="560" height="200" rx="16" fill="var(--color-card)"/>
                    <path d="M200 330 Q310 310 380 360 Q450 410 560 350 Q630 300 700 340" stroke="var(--color-secondary)" stroke-width="4" fill="none" stroke-linecap="round"/>
                    <!-- Map pins -->
                    <circle cx="380" cy="360" r="8" fill="var(--color-primary)"/>
                    <circle cx="560" cy="350" r="8" fill="var(--color-secondary)"/>

                    <!-- Person body -->
                    <g transform="translate(400,140)">
                        <!-- Head -->
                        <circle cx="0" cy="-10" r="36" fill="#FBBF77"/>
                        <!-- Hair -->
                        <ellipse cx="0" cy="-42" rx="36" ry="16" fill="#4f46e5" opacity=".8"/>
                        <!-- Torso -->
                        <rect x="-28" y="26" width="56" height="72" rx="8" fill="var(--color-primary)"/>
                        <!-- Legs -->
                        <rect x="-22" y="96" width="18" height="60" rx="6" fill="#334155"/>
                        <rect x="4" y="96" width="18" height="60" rx="6" fill="#334155"/>
                        <!-- Shoes -->
                        <ellipse cx="-13" cy="158" rx="14" ry="6" fill="#1e293b"/>
                        <ellipse cx="13" cy="158" rx="14" ry="6" fill="#1e293b"/>
                        <!-- Left arm (holding map) -->
                        <rect x="-56" y="30" width="30" height="14" rx="7" fill="#FBBF77" transform="rotate(-20,-42,37)"/>
                        <!-- Right arm (pointing) -->
                        <rect x="26" y="30" width="30" height="14" rx="7" fill="#FBBF77" transform="rotate(30,40,37)"/>
                        <!-- Question mark bubble -->
                        <ellipse cx="64" cy="-30" rx="28" ry="22" fill="var(--color-card)" stroke="var(--color-border)" stroke-width="2"/>
                        <text x="64" y="-22" text-anchor="middle" font-size="22" font-weight="700" fill="var(--color-primary)">?</text>
                    </g>
                </svg>
            </div>

            <h1 class="error-title">404</h1>
            <h2 class="error-subtitle"><?php esc_html_e( 'Página não encontrada', 'netrunner' ); ?></h2>
            <p class="error-message">
                <?php esc_html_e( 'Parece que você se perdeu na matrix. A página que você procura não existe ou foi movida.', 'netrunner' ); ?>
            </p>

            <!-- Campo de busca -->
            <div class="error-search">
                <?php get_search_form(); ?>
            </div>

            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary btn-lg">
                <?php esc_html_e( '← Voltar para o início', 'netrunner' ); ?>
            </a>

        </div><!-- .error-content -->
    </div><!-- .container -->
</main>

<?php get_footer(); ?>
