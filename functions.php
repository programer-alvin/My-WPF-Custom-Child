<?php
/**
 * Automatically include all PHP files from all subfolders in the child theme.
 */

function childtheme_load_all_php_files() {
    $theme_dir = get_stylesheet_directory(); // Path to child theme
    $iterator  = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($theme_dir)
    );

    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            // Skip the main functions.php itself to avoid recursion
            if (basename($file) !== 'functions.php') {
                require_once $file->getPathname();
            }
        }
    }
}
childtheme_load_all_php_files();
