<?php
// Remove execution time limit.
ini_set('max_execution_time', 0);

require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/functions.php';

$framework_files = glob(dirname(__DIR__) . '/src/frameworks/*.php');


#region Frameworks update -----------------------------------------------------------

$framework_files_output = dirname(__DIR__) . '/src/frameworks/compiled/';
$index_dir = dirname(__DIR__) . '/src/frameworks/indexed';
$index_file = $framework_files_output . '_index.php';

$frameworks_index = array();

foreach ($framework_files as $key => $file) {
    $file = canonize_file_path($file);

    $slug = substr($file, strrpos($file, '/') + 1, -4);
    $framework_path = $framework_files_output . substr($file, strrpos($file, '/') + 1);

    console_log($slug . ' - Starting to handle framework.');

    // Get framework data.
    require_once $file;

    // Get slug from filename.
    $framework['slug'] = $slug;

    dump_var_to_php_file($framework, '$framework', $framework_path);

    $frameworks_updates[$slug] = time();

    // Fetch framework's themes and plugin slugs.
    dump_framework_items($framework, $index_dir);

    $frameworks_index[$slug] = $framework;
}


// Dump index.
dump_var_to_php_file($frameworks_index, '$frameworks_index', $index_file);


#endregion Frameworks update -----------------------------------------------------------


if (true) {
    #region Build Sitemap -----------------------------------------------------------

    $sitemap = <<<EOT
<?xml version="1.0" encoding="UTF-8"?>
<urlset
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    <url>
        <loc>https://landingpageframeworks.com/</loc>
        <changefreq>daily</changefreq>
        <priority>1</priority>
    </url>
EOT;

    foreach ($framework_files as $key => $file) {
        $slug = substr($file, strrpos($file, '/') + 1, -4);

        $sitemap .= <<<EOT
    <url>
        <loc>https://landingpageframeworks.com/{$slug}/</loc>
        <changefreq>weekly</changefreq>
        <priority>1</priority>
    </url>

EOT;
    }

    $sitemap .= "\n</urlset>";

    $sitemap_path = dirname(__DIR__) . '/src/htdocs/sitemap.xml';

    if (file_exists($sitemap_path))
        unlink($sitemap_path);

    file_put_contents($sitemap_path, $sitemap);

    #endregion Build Sitemap -----------------------------------------------------------

}