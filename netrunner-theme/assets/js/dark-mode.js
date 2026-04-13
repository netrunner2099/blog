/**
 * Netrunner Theme — Dark Mode JS
 * Gerencia o toggle de dark/light mode com localStorage e prefers-color-scheme.
 */
(function () {
    'use strict';

    var STORAGE_KEY = 'netrunner-color-scheme';
    var CLASS_DARK  = 'dark-mode';
    var CLASS_LIGHT = 'light-mode';

    /**
     * Retorna a preferência salva ou null.
     */
    function getSavedPreference() {
        try {
            return localStorage.getItem(STORAGE_KEY);
        } catch (e) {
            return null;
        }
    }

    /**
     * Salva a preferência escolhida.
     */
    function savePreference(scheme) {
        try {
            localStorage.setItem(STORAGE_KEY, scheme);
        } catch (e) { /* nada */ }
    }

    /**
     * Verifica se o sistema do usuário prefere dark mode.
     */
    function systemPrefersDark() {
        return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
    }

    /**
     * Aplica o modo correto ao body.
     */
    function applyScheme(scheme) {
        var body = document.body;
        if (scheme === 'dark') {
            body.classList.add(CLASS_DARK);
            body.classList.remove(CLASS_LIGHT);
        } else {
            body.classList.add(CLASS_LIGHT);
            body.classList.remove(CLASS_DARK);
        }
    }

    /**
     * Determina o esquema atual com base em preferência salva → sistema → light.
     */
    function resolveInitialScheme() {
        var saved = getSavedPreference();
        if (saved === 'dark' || saved === 'light') {
            return saved;
        }
        return systemPrefersDark() ? 'dark' : 'light';
    }

    // ── Aplicação imediata (evita FOUC) ──────────────────────────────────────
    var initialScheme = resolveInitialScheme();
    applyScheme(initialScheme);

    // ── Toggle via botão ─────────────────────────────────────────────────────
    document.addEventListener('DOMContentLoaded', function () {
        var toggleBtn = document.getElementById('dark-mode-toggle');
        if (!toggleBtn) return;

        // Garante que o ícone já está correto
        syncToggleIcon(toggleBtn, document.body.classList.contains(CLASS_DARK));

        toggleBtn.addEventListener('click', function () {
            var isDark   = document.body.classList.contains(CLASS_DARK);
            var newScheme = isDark ? 'light' : 'dark';

            applyScheme(newScheme);
            savePreference(newScheme);
            syncToggleIcon(toggleBtn, newScheme === 'dark');
        });

        // Escuta mudanças do sistema (quando o usuário não fez escolha manual)
        if (window.matchMedia) {
            var mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
            mediaQuery.addEventListener('change', function (e) {
                var saved = getSavedPreference();
                if (!saved) {
                    var newScheme = e.matches ? 'dark' : 'light';
                    applyScheme(newScheme);
                    syncToggleIcon(toggleBtn, e.matches);
                }
            });
        }
    });

    /**
     * Garante que o ícone do toggle exibe sol ou lua.
     */
    function syncToggleIcon(btn, isDark) {
        var sun  = btn.querySelector('.icon-sun');
        var moon = btn.querySelector('.icon-moon');
        if (!sun || !moon) return;

        if (isDark) {
            sun.style.display  = 'none';
            moon.style.display = 'inline';
        } else {
            sun.style.display  = 'inline';
            moon.style.display = 'none';
        }
    }

})();
