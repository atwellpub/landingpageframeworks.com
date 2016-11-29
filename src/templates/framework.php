<?php

   $frameworks = dirname(dirname(__DIR__)) . "/src/frameworks/compiled/{$framework_slug}.php";
   $framework_url     = "https://landingpageframeworks.com/{$framework_slug}/";

    if (file_exists($frameworks))
        require_once $frameworks;
    if (file_exists($framework_themes))
        require_once $framework_themes;

    $plugins_count   = isset($plugins) ? count($plugins) : 0;
    $themes_count    = isset($themes) ? count($themes) : 0;
    $total_downloads = 0;
    $total_active    = 0;
    if ($plugins_count > 0)
    {
        foreach ($plugins as $slug => $plugin)
        {
            $total_downloads += $plugin['wordpress']['downloads'];
            $total_active += $plugin['wordpress']['active'];
        }
    }

    if ($themes_count > 0)
    {
        foreach ($themes as $slug => $theme)
        {
            $total_downloads += $theme['wordpress']['downloads'];
            $total_active += $theme['wordpress']['active'];
        }
    }

    $counter = ($total_active > 100000) ?
        number_format($total_active) . '+ active installs' :
        number_format($total_downloads) . ' downloads';

    if ($total_active > 100000)
    {
        //    #Freemius framework powers 2,000,000+ websites a/ used by 38 #plugins on #WordPress.org.
        $tweet = $framework['name'] . ' framework powers ' . number_format($total_active) . '+ websites and is used by ' .
                 ($plugins_count > 0 ? number_format($plugins_count) . ' #plugins' : '') .
                 ($themes_count > 0 ? ($plugins_count > 0 ? ' & ' : '') . number_format($themes_count) . ' #themes' : '') .
                 ' on #WordPress.org.';
    }
    else
    {
        //    #Freemius framework is used by 38 #plugins on #WordPress.org & 54 #themes with 2,000,000 downloads.
        $tweet = $framework['name'] . ' framework is used by ' .
                 ($plugins_count > 0 ? number_format($plugins_count) . ' #plugins' : '') .
                 ($themes_count > 0 ? ($plugins_count > 0 ? ' & ' : '') . number_format($themes_count) . ' #themes' : '') .
                 ' on #WordPress.org with ' . $counter . '.';
    }

    $is_empty_result = (0 === ($plugins_count + $themes_count));
?>
<section id="framework" class="section">
    <div id="focus"></div>
    <div class="container row">
        <h1><?php echo $framework_name ?></h1>

        <p><?php echo $framework['description'] ?></p>

        <div class="row">
            <?php if (isset($framework['wp_slug']) && $framework['wp_slug']) : ?>
                <div class="col s4">
                    <nobr><a class="wordpress"
                             href="https://wordpress.org/plugins/<?php echo trim($framework['wp_slug'], '/') ?>/"
                             target="_blank" title="WordPress.org"><i class="fa fa-wordpress"></i> WP.org</a></nobr>
                </div>
            <?php endif ?>
            <div class="col">
                <nobr><a class="github" href="https://github.com/<?php echo trim($framework['github_repo'], '/') ?>/"
                         target="_blank" title="GitHub"><i class="fa fa-github"></i>
                        https://github.com/<?php echo trim($framework['github_repo'], '/') ?>/</a></nobr>
            </div>
            <div class="col">
                <nobr><a class="homepage" href="<?php echo trim($framework['homepage'], '/') ?>/" target="_blank"
                         title="Homepage"><i class="fa fa-home"></i> <?php echo trim($framework['homepage'], '/') ?>
                        /</a></nobr>
            </div>
        </div>

        <blockquote>
                <a href="https://twitter.com/home?status=<?php echo urlencode($tweet . " $framework_url") ?>"
                   target="_blank"><i class="fa fa-twitter"></i> <?php echo $tweet ?></a>
                <span class="tweet-button"><a href="https://twitter.com/share" class="twitter-share-button"
                                              data-text="<?php echo htmlspecialchars($tweet) ?>"
                                              data-url="<?php echo $framework_url ?>"
                                              data-size="large"
                                              data-count="none">Tweet</a></span>
        </blockquote>
        <?php if ( ! $is_empty_result) : ?>
            <script type="text/javascript">!function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (!d.getElementById(id)) {
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "https://platform.twitter.com/widgets.js";
                        fjs.parentNode.insertBefore(js, fjs);
                    }
                }(document, "script", "twitter-wjs");</script>
        <?php endif ?>
    </div>
</section>

<?php if ( ! $is_empty_result) : ?>
    <?php require dirname(__DIR__) . '/templates/filters.php' ?>

    <?php require dirname(__DIR__) . '/templates/framework-products.php' ?>
<?php endif ?>

<script type="text/javascript">
    sortItems(
        'installs',
        $('#sortby li:first-of-type a').html().replace('Sort', 'Sorted')
    );
</script>
