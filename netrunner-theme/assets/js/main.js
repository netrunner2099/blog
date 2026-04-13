/**
 * Netrunner Theme — Main JS
 * Funcionalidades: hamburger menu, reading progress bar, scroll suave.
 */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {

        // ── Hamburger menu ───────────────────────────────────────────────────
        var hamburger  = document.getElementById('hamburger');
        var primaryNav = document.getElementById('primary-nav');

        if (hamburger && primaryNav) {
            hamburger.addEventListener('click', function () {
                var isOpen = hamburger.classList.toggle('is-active');
                primaryNav.classList.toggle('is-open', isOpen);
                hamburger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                hamburger.setAttribute('aria-label',
                    isOpen
                        ? 'Fechar menu'
                        : 'Abrir menu'
                );
            });

            // Fecha o menu ao clicar em um link
            primaryNav.querySelectorAll('a').forEach(function (link) {
                link.addEventListener('click', function () {
                    hamburger.classList.remove('is-active');
                    primaryNav.classList.remove('is-open');
                    hamburger.setAttribute('aria-expanded', 'false');
                });
            });

            // Fecha o menu ao clicar fora
            document.addEventListener('click', function (e) {
                if (
                    primaryNav.classList.contains('is-open') &&
                    !primaryNav.contains(e.target) &&
                    !hamburger.contains(e.target)
                ) {
                    hamburger.classList.remove('is-active');
                    primaryNav.classList.remove('is-open');
                    hamburger.setAttribute('aria-expanded', 'false');
                }
            });
        }

        // ── Barra de progresso de leitura ────────────────────────────────────
        var progressBar = document.getElementById('reading-progress');
        if (progressBar) {
            window.addEventListener('scroll', function () {
                var scrollTop    = window.scrollY || document.documentElement.scrollTop;
                var docHeight    = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                var scrollPct    = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
                progressBar.style.width = Math.min(scrollPct, 100) + '%';
            }, { passive: true });
        }

        // ── Scroll suave para âncoras internas ───────────────────────────────
        document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
            anchor.addEventListener('click', function (e) {
                var target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    var headerOffset = 80; // altura do header fixo + pequena folga
                    var targetTop = target.getBoundingClientRect().top + window.scrollY - headerOffset;
                    window.scrollTo({ top: targetTop, behavior: 'smooth' });
                }
            });
        });

        // ── Header: adiciona sombra ao rolar ─────────────────────────────────
        var siteHeader = document.getElementById('site-header');
        if (siteHeader) {
            window.addEventListener('scroll', function () {
                if (window.scrollY > 20) {
                    siteHeader.classList.add('scrolled');
                } else {
                    siteHeader.classList.remove('scrolled');
                }
            }, { passive: true });
        }

    });

})();
