<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
<aside id="secondary" class="widget-area sidebar">
    <div class="sidebar-inner">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
</aside>
<?php endif; ?>
