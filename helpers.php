<?php

use Framework\ApplicationSettings;

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
function loadView($name, $data = ['title' => null, 'page' => null, 'description' => null])
{
    $viewPath = basePath("App/views/{$name}.view.php");

    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "View '{$name}' not found!";
    }
}

/**
 * Load a partial template
 *
 * @param  string  $name
 * @return void
 */
function loadPartial($name, $data = [])
{
    $partialPath = basePath("App/views/partials/{$name}.php");

    if (file_exists($partialPath)) {
        extract($data);
        require $partialPath;
    } else {
        echo "Partial '{$name}' not found!";
    }
}

/**
 * Load application's settings
 *
 * @return array
 */
function appSettings($key, $default = null)
{
    return ApplicationSettings::getInstance()->get($key, $default);
}
