<?php

/**
 * Get the path relative to root dir
 *
 * @param string path
 * @return string
 */
function basePath($path = '')
{
    return __DIR__.'/'.$path;
}

/**
 * Load a view
 *
 * @param  string  $name
 * @return void
 */
function loadView($name, $data = [])
{
    $viewPath = basePath("App/views/{$name}.view.php");

    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "View '{$name}' not found!";
    }
}
