<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

if (! function_exists('\Roots\bootloader')) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://roots.io/acorn/docs/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

\Roots\bootloader()->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });


    /**
 * Register a custom post type called "Movie"
 */
function register_movie_post_type() {
    $labels = [
        'name'               => __('Movies', 'sage'),
        'singular_name'      => __('Movie', 'sage'),
        'menu_name'          => __('Movies', 'sage'),
        'name_admin_bar'     => __('Movie', 'sage'),
        'add_new'            => __('Add New', 'sage'),
        'add_new_item'       => __('Add New Movie', 'sage'),
        'new_item'           => __('New Movie', 'sage'),
        'edit_item'          => __('Edit Movie', 'sage'),
        'view_item'          => __('View Movie', 'sage'),
        'all_items'          => __('All Movies', 'sage'),
        'search_items'       => __('Search Movies', 'sage'),
        'parent_item_colon'  => __('Parent Movies:', 'sage'),
        'not_found'          => __('No movies found.', 'sage'),
        'not_found_in_trash' => __('No movies found in Trash.', 'sage'),
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => ['slug' => 'movie'],
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => ['title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'],
    ];

    register_post_type('movie', $args);
}

// Move the add_action() call after the function definition
add_action('init', 'register_movie_post_type');