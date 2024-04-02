<footer class="content-info">
  @php(dynamic_sidebar('sidebar-footer'))
  @if (has_nav_menu('footer_navigation'))
    <nav class="nav-footer" aria-label="{{ wp_get_nav_menu_name('footer_navigation') }}">
      {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
    </nav>
  @endif
</footer>
