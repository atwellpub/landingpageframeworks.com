<?php $has_wp_repo = isset($framework['wp_slug']) ?>
<div class="card-container col s12 m6 l4 <?php echo $framework['category']; ?>">
    <div class="card small">
        <div class="card-image">
            <a href="#<?php echo $framework['homepage'] ?>" target="_blank">
                <div class="image-container">
                    <img src="<?php echo $framework['banner'] ?>">
                </div>
            </a>
            <div class="card-title-container">
            <span class="card-title"><a
                    href="<?php echo $framework['slug'] ?>/#focus"><?php echo $framework['full_name'] ?> </a></span>
            </div>
        <?php //echo $framework['name'] ?><!--</a></span>-->

    </div>
    <div class="card-content">
        <!-- Short Desc -->
        <p><?php echo $framework['short_description'] ?></p>
    </div>
    <div class="card-action left">
        <?php $col_width = $has_wp_repo ? 's4' : 's6' ?>
        <?php if (isset($framework['wp_slug']) && $framework['wp_slug']) : ?>
            <div class="col s4">
                <nobr><a class="wordpress"
                         href="https://wordpress.org/plugins/<?php echo trim($framework['wp_slug'], '/') ?>/"
                         target="_blank" title="WordPress.org"><i class="fa fa-wordpress"></i> WP.org</a></nobr>
            </div>
        <?php endif; ?>


        <div class="col <?php echo $col_width ?>">
            <nobr><a class="homepage" href="<?php echo trim($framework['homepage'], '/') ?>/" target="_blank"
                     title="Homepage"><i class="fa fa-home"></i> Homepage</a></nobr>
        </div>


        <?php
        /* Start Documentation Link */
        if (isset($framework['pricing']) && $framework['pricing']) :
            ?>
            <div class="col <?php echo $col_width ?>">
                <nobr><a class="pricing" href="<?php echo trim($framework['pricing'], '/') ?>/"
                         target="_blank" title="Pricing"><i class="fa fa-credit-card"></i> Pricing</a></nobr>
            </div>
            <?php
        endif;
        ?>

        <?php
        /* Start Documentation Link */
        if (isset($framework['documentation']) && $framework['documentation']) :
            ?>
            <div class="col <?php echo $col_width ?>">
                <nobr><a class="documentation" href="<?php echo trim($framework['documentation'], '/') ?>/"
                         target="_blank" title="Documentation"><i class="fa fa-info-circle"></i> Docs</a></nobr>
            </div>
            <?php
        endif;
        ?>

        <?php
        /* Start Documentation Link */
        if (isset($framework['demo']) && $framework['demo']) :
            ?>
            <div class="col <?php echo $col_width ?>">
                <nobr><a class="demo" href="<?php echo trim($framework['demo'], '/') ?>/"
                         target="_blank" title="Demo"><i class="fa fa-eye"></i> Demo</a></nobr>
            </div>
            <?php
        endif;
        ?>

        <?php
        /* Start Reviews Link */
        if (isset($framework['reviews']) && $framework['reviews']) :
            ?>
            <div class="col <?php echo $col_width ?>">
                <nobr><a class="reviews" href="<?php echo trim($framework['reviews'], '/') ?>/"
                         target="_blank" title="Reviews"><i class="fa fa-comments-o"></i> Reviews</a></nobr>
            </div>
            <?php
        endif;
        ?>

        <?php
        /* Start Support Link */
        if (isset($framework['support']) &&$framework['support']) :
            ?>
            <div class="col <?php echo $col_width ?>">
                <nobr><a class="support" href="<?php echo trim($framework['support'], '/') ?>/"
                         target="_blank" title="Support"><i class="fa fa-user-circle"></i> Support</a></nobr>
            </div>
            <?php
        endif;
        ?>

        <?php
        /* Start Affiliate Program Link */
        if (isset($framework['affiliate_program']) &&$framework['affiliate_program']) :
            ?>
            <div class="col <?php echo $col_width ?>">
                <nobr><a class="affiliate_program" href="<?php echo trim($framework['affiliate_program'], '/') ?>/"
                         target="_blank" title="Affiliate Program"><i class="fa fa-usd"></i> Affiliate</a></nobr>
            </div>
            <?php
        endif;
        ?>

        <?php
        /* Start Github */
        if (isset($framework['github_repo']) && $framework['github_repo']) :
            ?>
            <div class="col <?php echo $col_width ?>">
                <nobr><a class="github" href="<?php echo trim($framework['github_repo'], '/') ?>/"
                         target="_blank" title="GitHub"><i class="fa fa-github"></i> GitHub</a></nobr>
            </div>
            <?php
        endif;
        ?>

        <?php
        /* Start Twitter */
        if (isset($framework['twitter']) && $framework['twitter']) :
            ?>
            <div class="col <?php echo $col_width ?>">
                <nobr><a class="twitter" href="<?php echo trim($framework['twitter'], '/') ?>/"
                         target="_blank" title="GitHub"><i class="fa fa-twitter"></i> twitter</a></nobr>
            </div>
            <?php
        endif;
        ?>

        <?php
        /* Start Facebook */
        if (isset($framework['facebook']) && $framework['facebook']) :
            ?>
            <div class="col <?php echo $col_width ?>">
                <nobr><a class="facebook" href="<?php echo trim($framework['facebook'], '/') ?>/"
                         target="_blank" title="GitHub"><i class="fa fa-facebook"></i> Facebook</a></nobr>
            </div>
            <?php
        endif;
        ?>

        <?php
        /* Start Pinterest */
        if (isset($framework['pinterest']) && $framework['pinterest']) :
            ?>
            <div class="col <?php echo $col_width ?>">
                <nobr><a class="facebook" href="<?php echo trim($framework['pinterest'], '/') ?>/"
                         target="_blank" title="Pinterest"><i class="fa fa-pinterest"></i> Pinterest</a></nobr>
            </div>
            <?php
        endif;
        ?>
    </div>
</div>
</div>
