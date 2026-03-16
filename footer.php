        <?php if (!is_404()) : ?>
            <footer id="footer" role="contentinfo" class="mt-auto">
                <nav class="navbar navbar-expand-lg bg-primary" id="navbar-bottom" role="navigation" data-bs-theme="dark">
                    <div class="container-xxl">
                        <div class="navbar-text text-white">
                            <?php
                            $copyright_year = $_ENV['COPYRIGHT_YEAR'];
                            $current_year = date('Y');
                            $copyright_years = ($copyright_year === $current_year) ? $current_year : "$copyright_year - $current_year";
                            echo __('Copyright', 'postwp') . " &copy $copyright_years " . get_option('blogname');
                            ?>
                        </div>
                        
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-bottom-collapse" aria-controls="navbar-bottom-collapse" aria-expanded="false" aria-label="<?php _e('Toggle navigation', 'postwp'); ?>">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbar-bottom-collapse">  
                            <?php
                            wp_nav_menu([
                                'theme_location' => 'bottom',
                                'container'      => false,
                                'menu_class'     => 'navbar-nav ms-lg-auto',
                            ]);
                            ?>
                        </div>
                    </div>
                </nav>
            </footer>
        <?php endif; ?>

        <?php wp_footer(); ?>
    </body>
</html>