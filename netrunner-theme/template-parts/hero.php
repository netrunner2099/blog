<section class="hero-section">
    <div class="container hero-inner">

        <!-- Texto do hero -->
        <div class="hero-content">
            <span class="hero-badge"><?php esc_html_e( 'Blog de Tecnologia', 'netrunner' ); ?></span>
            <h1 class="hero-title">
                <?php esc_html_e( 'Tecnologia sem complicação', 'netrunner' ); ?>
            </h1>
            <p class="hero-subtitle">
                <?php esc_html_e( 'Guias práticos de segurança digital, otimização e dicas para o dia a dia', 'netrunner' ); ?>
            </p>
            <div class="hero-actions">
                <a href="#recent-posts" class="btn btn-primary btn-lg">
                    <?php esc_html_e( 'Ver artigos', 'netrunner' ); ?>
                </a>
                <a href="<?php echo esc_url( home_url( '/sobre' ) ); ?>" class="btn btn-outline btn-lg">
                    <?php esc_html_e( 'Sobre o blog', 'netrunner' ); ?>
                </a>
            </div>
        </div>

        <!-- Ilustração SVG unDraw — Pessoa com laptop e escudo de segurança -->
        <div class="hero-illustration" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 500" width="100%" max-width="560">

                <!-- Laptop base -->
                <rect x="100" y="310" width="360" height="20" rx="6" fill="#334155"/>
                <rect x="130" y="200" width="300" height="200" rx="10" fill="#1e293b"/>
                <rect x="140" y="210" width="280" height="175" rx="6" fill="var(--color-primary)" opacity=".15"/>

                <!-- Screen content lines -->
                <rect x="155" y="225" width="120" height="8" rx="4" fill="var(--color-primary)" opacity=".7"/>
                <rect x="155" y="243" width="80" height="6" rx="3" fill="var(--color-secondary)" opacity=".6"/>
                <rect x="155" y="260" width="200" height="6" rx="3" fill="var(--color-text)" opacity=".3"/>
                <rect x="155" y="275" width="160" height="6" rx="3" fill="var(--color-text)" opacity=".3"/>
                <rect x="155" y="290" width="180" height="6" rx="3" fill="var(--color-text)" opacity=".25"/>
                <!-- Code block -->
                <rect x="155" y="310" width="240" height="55" rx="6" fill="#0f172a" opacity=".5"/>
                <rect x="165" y="320" width="60" height="5" rx="2" fill="#818cf8" opacity=".9"/>
                <rect x="165" y="332" width="100" height="5" rx="2" fill="#22d3ee" opacity=".8"/>
                <rect x="165" y="344" width="80" height="5" rx="2" fill="#f1f5f9" opacity=".5"/>

                <!-- Person sitting -->
                <g transform="translate(430,260)">
                    <!-- Head -->
                    <circle cx="0" cy="-20" r="34" fill="#FBBF77"/>
                    <!-- Hair -->
                    <ellipse cx="0" cy="-50" rx="34" ry="14" fill="var(--color-primary)"/>
                    <!-- Torso -->
                    <rect x="-28" y="14" width="56" height="70" rx="8" fill="var(--color-secondary)" opacity=".8"/>
                    <!-- Arms -->
                    <rect x="-60" y="18" width="34" height="14" rx="7" fill="#FBBF77" transform="rotate(-10,-45,25)"/>
                    <rect x="26" y="18" width="34" height="14" rx="7" fill="#FBBF77" transform="rotate(10,42,25)"/>
                    <!-- Legs -->
                    <rect x="-24" y="82" width="18" height="56" rx="6" fill="#334155"/>
                    <rect x="6"  y="82" width="18" height="56" rx="6" fill="#334155"/>
                    <!-- Shoes -->
                    <ellipse cx="-15" cy="140" rx="14" ry="6" fill="#1e293b"/>
                    <ellipse cx="15"  cy="140" rx="14" ry="6" fill="#1e293b"/>
                </g>

                <!-- Shield (security icon) -->
                <g transform="translate(50,140)">
                    <path d="M60 0 L100 20 L100 65 Q100 100 60 115 Q20 100 20 65 L20 20 Z"
                          fill="var(--color-primary)" opacity=".15" stroke="var(--color-primary)" stroke-width="3"/>
                    <!-- Checkmark -->
                    <polyline points="38,62 54,78 82,50" stroke="var(--color-primary)" stroke-width="6"
                              fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                </g>

                <!-- Floating badges -->
                <rect x="50" y="300" width="90" height="28" rx="14" fill="var(--color-primary)" opacity=".12"/>
                <text x="95" y="319" text-anchor="middle" font-size="11" fill="var(--color-primary)" font-family="Inter,sans-serif" font-weight="600">🔒 Segurança</text>

                <rect x="470" y="150" width="90" height="28" rx="14" fill="var(--color-secondary)" opacity=".12"/>
                <text x="515" y="169" text-anchor="middle" font-size="11" fill="var(--color-secondary)" font-family="Inter,sans-serif" font-weight="600">⚡ Performance</text>

                <rect x="230" y="420" width="100" height="28" rx="14" fill="var(--color-primary)" opacity=".12"/>
                <text x="280" y="439" text-anchor="middle" font-size="11" fill="var(--color-primary)" font-family="Inter,sans-serif" font-weight="600">💡 Tutoriais</text>

            </svg>
        </div>

    </div><!-- .hero-inner -->
</section><!-- .hero-section -->
