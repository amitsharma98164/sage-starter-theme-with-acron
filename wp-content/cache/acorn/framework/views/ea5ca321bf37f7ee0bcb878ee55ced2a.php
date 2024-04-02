<footer class="content-info">
  <?php (dynamic_sidebar('sidebar-footer')); ?>
  <?php if(has_nav_menu('footer_navigation')): ?>
    <nav class="nav-footer" aria-label="<?php echo e(wp_get_nav_menu_name('footer_navigation')); ?>">
      <?php echo wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav', 'echo' => false]); ?>

    </nav>
  <?php endif; ?>
</footer>
<?php /**PATH /Applications/MAMP/htdocs/sage/wp-content/themes/sage-theme/resources/views/sections/footer.blade.php ENDPATH**/ ?>