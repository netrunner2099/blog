<section class="newsletter-section">
    <div class="container">
        <div class="newsletter-inner">

            <!-- Conteúdo textual -->
            <div class="newsletter-content">
                <h2 class="newsletter-title"><?php esc_html_e( 'Receba dicas no seu e-mail', 'netrunner' ); ?></h2>
                <p class="newsletter-subtitle">
                    <?php esc_html_e( 'Conteúdo semanal sobre segurança digital e tecnologia sem complicação', 'netrunner' ); ?>
                </p>

                <form class="newsletter-form" action="" method="post" novalidate>
                    <?php wp_nonce_field( 'netrunner_newsletter', 'netrunner_newsletter_nonce' ); ?>
                    <div class="newsletter-form-row">
                        <label class="sr-only" for="newsletter-email">
                            <?php esc_html_e( 'Seu e-mail', 'netrunner' ); ?>
                        </label>
                        <input
                            type="email"
                            id="newsletter-email"
                            name="newsletter_email"
                            class="newsletter-input"
                            placeholder="<?php esc_attr_e( 'seu@email.com', 'netrunner' ); ?>"
                            required
                            autocomplete="email"
                        >
                        <button type="submit" class="btn btn-white">
                            <?php esc_html_e( 'Quero receber', 'netrunner' ); ?>
                        </button>
                    </div>
                    <p class="newsletter-privacy">
                        <?php esc_html_e( '🔒 Sem spam. Cancele quando quiser.', 'netrunner' ); ?>
                    </p>
                </form>
            </div>

            <!-- Ilustração SVG unDraw — Pessoa recebendo notificações -->
            <div class="newsletter-illustration" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480 400" width="100%">

                    <!-- Email envelope -->
                    <rect x="100" y="140" width="280" height="200" rx="16" fill="white" opacity=".15" stroke="white" stroke-width="2" stroke-opacity=".3"/>
                    <polyline points="100,140 240,240 380,140" stroke="white" stroke-width="2" fill="none" stroke-opacity=".5"/>

                    <!-- Person -->
                    <g transform="translate(340,100)">
                        <!-- Head -->
                        <circle cx="0" cy="0" r="32" fill="#FBBF77"/>
                        <!-- Hair -->
                        <ellipse cx="0" cy="-28" rx="32" ry="12" fill="white" opacity=".6"/>
                        <!-- Torso -->
                        <rect x="-26" y="32" width="52" height="64" rx="8" fill="white" opacity=".25"/>
                        <!-- Arms raising (excited) -->
                        <rect x="-60" y="20" width="36" height="14" rx="7" fill="#FBBF77" transform="rotate(-40,-42,27)"/>
                        <rect x="24" y="20" width="36" height="14" rx="7" fill="#FBBF77" transform="rotate(40,42,27)"/>
                        <!-- Legs -->
                        <rect x="-20" y="94" width="16" height="50" rx="6" fill="white" opacity=".25"/>
                        <rect x="4"  y="94" width="16" height="50" rx="6" fill="white" opacity=".25"/>
                    </g>

                    <!-- Notification bubbles -->
                    <g>
                        <!-- Bubble 1 -->
                        <rect x="50" y="80" width="120" height="36" rx="18" fill="white" opacity=".2"/>
                        <text x="110" y="103" text-anchor="middle" font-size="13" fill="white" font-family="Inter,sans-serif">📩 Nova dica!</text>

                        <!-- Bubble 2 -->
                        <rect x="290" y="50" width="140" height="36" rx="18" fill="white" opacity=".2"/>
                        <text x="360" y="73" text-anchor="middle" font-size="13" fill="white" font-family="Inter,sans-serif">🔔 Semana #42</text>

                        <!-- Bubble 3 -->
                        <rect x="60" y="330" width="150" height="36" rx="18" fill="white" opacity=".15"/>
                        <text x="135" y="353" text-anchor="middle" font-size="13" fill="white" font-family="Inter,sans-serif">✅ 1.200 leitores</text>
                    </g>

                </svg>
            </div>

        </div><!-- .newsletter-inner -->
    </div><!-- .container -->
</section><!-- .newsletter-section -->
