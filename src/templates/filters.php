<?php
if (empty($framework_slug)) {
    // GitHub data.
    $sort_by = array(
        'stars' => 'star',
        'forks' => 'code-fork',
        'issues' => 'bug',
    );
} else {
    // WordPress.org data.
    $sort_by = array(
        'installs' => 'heartbeat',
        'rate' => 'star',
        'downloads' => 'download',
    );
}

reset($sort_by);
$default_sort_by = key($sort_by);
?>
<!-- Filters -->
<div id="filters">
    <div class="placeholder"></div>

    <div class="section">
        <div class="container row valign-wrapper center">
            <div class="col s12 valign">
                <input type="checkbox" id="show_wordpress" checked="checked" class="filled-in checkbox-black"/>
                <label for="show_wordpress"
                       class="wordpress uppercase">WordPress<?php echo isset($plugins_count) ? " [{$plugins_count}]" : '' ?>
                    <i class="fa fa-wordpress wordpress"></i></label>

                <input type="checkbox" id="show_joomla" checked="checked" class="filled-in checkbox-black"/>
                <label for="show_joomla"
                       class="joomla uppercase">Joomla<?php echo isset($joomla_count) ? " [{$joomla_count}]" : '' ?> <i
                        class="fa fa-joomla joomla"></i></label>


                <input type="checkbox" id="show_third_party" checked="checked" class="filled-in checkbox-black"/>
                <label for="show_third_party"
                       class="third_party uppercase">Third Party<?php echo isset($third_party_count) ? " [{$third_party_count}]" : '' ?> <i
                        class="fa fa-address-book third_party"></i></label>

                <input type="checkbox" id="show_boilerplate" checked="checked" class="filled-in checkbox-black"/>
                <label for="show_boilerplate"
                       class="boilerplate uppercase">Boilerplate<?php echo isset($boilerplate_count) ? " [{$boilerplate_count}]" : '' ?> <i
                        class="fa fa-github boilerplate"></i></label>


            </div>

            <script type="text/javascript">


                $('#sortby a').on('click', function () {
                    sortItems(
                        $(this).attr('data-sort'),
                        $(this).html().replace('Sort', 'Sorted')
                    );
                });

                $('#show_wordpress').change(function () {
                    if ($(this).is(':checked'))
                        $('.card-container.wordpress').fadeIn();
                    else
                        $('.card-container.wordpress:not(.joomla)').fadeOut();
                });
                $('#show_joomla').change(function () {
                    if ($(this).is(':checked'))
                        $('.card-container.joomla').fadeIn();
                    else
                        $('.card-container.joomla:not(.plugins)').fadeOut();
                });
                $('#show_boilerplate').change(function () {
                    if ($(this).is(':checked'))
                        $('.card-container.boilerplate').fadeIn();
                    else
                        $('.card-container.boilerplate:not(.plugins)').fadeOut();
                });
                $('#show_third_party').change(function () {
                    if ($(this).is(':checked'))
                        $('.card-container.third_party').fadeIn();
                    else
                        $('.card-container.third_party:not(.plugins)').fadeOut();
                });
            </script>
        </div>
    </div>
</div>
<!--/ Filters -->