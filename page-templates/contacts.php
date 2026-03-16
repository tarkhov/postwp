<?php /* Template Name: Contacts */ __('Contacts', 'electron'); ?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div data-elementor-type="wp-page" data-elementor-id="13954" class="elementor elementor-13954">
        <div class="elementor-element elementor-element-0d2a280 nt-section section-padding e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="0d2a280" data-element_type="container" data-e-type="container">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-36d7e74 e-con-full e-flex e-con e-child" data-id="36d7e74" data-element_type="container" data-e-type="container">
                    <div class="elementor-element elementor-element-80ebb02 elementor-widget elementor-widget-electron-widget-label" data-id="80ebb02" data-element_type="widget" data-e-type="widget" data-widget_type="electron-widget-label.default">
                        <div class="elementor-widget-container">
                            <span class="electron-widget-label electron-bg-primary electron-solid electron-radius label-small">faq</span>				
                        </div>
                    </div>

                    <?php $name = get_field('name'); if ($name) : ?>
                        <div class="elementor-element elementor-element-12f5b01 electron-transform transform-type-translate elementor-widget elementor-widget-heading" data-id="12f5b01" data-element_type="widget" data-e-type="widget" data-widget_type="heading.default">
                            <h4 class="elementor-heading-title elementor-size-default">
                                <?php echo $name; ?>
                            </h4>
                        </div>
                    <?php endif; ?>

                    <?php if (has_excerpt()) : ?>
                        <div class="elementor-element elementor-element-eab1579 electron-transform transform-type-translate elementor-widget elementor-widget-heading" data-id="eab1579" data-element_type="widget" data-e-type="widget" data-widget_type="heading.default">
                            <span class="elementor-heading-title elementor-size-default"><?php echo get_the_excerpt(); ?></span>				
                        </div>
                    <?php endif; ?>

                    <?php echo do_shortcode(str_replace('<br>', '', get_the_content())); ?>

                    <div class="elementor-element elementor-element-c7be5c5 electron-transform transform-type-translate elementor-widget elementor-widget-heading" data-id="c7be5c5" data-element_type="widget" data-e-type="widget" data-widget_type="heading.default">
                        <h6 class="elementor-heading-title elementor-size-default">Social Media Accounts</h6>
                    </div>
                    <div class="elementor-element elementor-element-bfe5aff elementor-shape-circle e-grid-align-left elementor-grid-0 elementor-widget elementor-widget-social-icons" data-id="bfe5aff" data-element_type="widget" data-e-type="widget" data-widget_type="social-icons.default">
                        <div class="elementor-social-icons-wrapper elementor-grid" role="list">
                            <span class="elementor-grid-item" role="listitem">
                                <a class="elementor-icon elementor-social-icon elementor-social-icon- elementor-repeater-item-82decfb" target="_blank">
                                    <span class="elementor-screen-only"></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="m75 512h362c41.355469 0 75-33.644531 75-75v-362c0-41.355469-33.644531-75-75-75h-362c-41.355469 0-75 33.644531-75 75v362c0 41.355469 33.644531 75 75 75zm-45-437c0-24.8125 20.1875-45 45-45h362c24.8125 0 45 20.1875 45 45v362c0 24.8125-20.1875 45-45 45h-362c-24.8125 0-45-20.1875-45-45zm0 0"></path>
                                        <path d="m256 391c74.4375 0 135-60.5625 135-135s-60.5625-135-135-135-135 60.5625-135 135 60.5625 135 135 135zm0-240c57.898438 0 105 47.101562 105 105s-47.101562 105-105 105-105-47.101562-105-105 47.101562-105 105-105zm0 0"></path>
                                        <path d="m406 151c24.8125 0 45-20.1875 45-45s-20.1875-45-45-45-45 20.1875-45 45 20.1875 45 45 45zm0-60c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0"></path>
                                    </svg>
                                </a>
                            </span>
                            <span class="elementor-grid-item" role="listitem">
                                <a class="elementor-icon elementor-social-icon elementor-social-icon- elementor-repeater-item-0ae0b67" target="_blank">
                                    <span class="elementor-screen-only"></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-46 0 512 512.00005">
                                        <path d="m54.023438 298.3125 17.359374 11.367188 6.566407-24.644532c11.621093-43.320312 10.390625-41.40625 11.554687-46.214844-.472656-2.699218-12.707031-35.246093-4.1875-74.789062l.167969-.910156c11.644531-76.882813 140.308594-97.808594 200.054687-47.78125 25.773438 21.582031 35.472657 53.96875 28.039063 93.660156-5.335937 28.503906-14.652344 49.757812-29.3125 66.886719-20.238281 23.648437-45.691406 25.570312-60.769531 17.347656-5.613282-3.058594-18.050782-12.261719-12.285156-31.554687 8.246093-27.613282 23.144531-69.203126 24.90625-99.363282 1.570312-26.867187-14.632813-48.734375-40.320313-54.414062-28.632813-6.332032-61.625 9.121094-75.890625 45.164062-10.265625 25.925782-10.238281 52.871094.085938 82.339844.335937 7.269531-7.0625 34.683594-13.03125 56.800781-18.042969 66.867188-42.757813 158.4375-18.6875 205.066407l7.605468 14.726562 13.890625-9.035156c39.699219-25.808594 62.890625-100.882813 75.601563-147.652344 33.460937 24.777344 80.875 26.867188 127.773437 3.964844 75.289063-36.769532 125.511719-124.511719 100.347657-222.199219-28.046876-108.878906-136.898438-151.082031-246.535157-133.050781-90.378906 14.859375-147.859375 73.402344-163.117187 145.558594-12.871094 60.878906 7.296875 120.648437 50.183594 148.726562zm-20.84375-142.523438c13.628906-64.464843 65.457031-110.136718 138.640624-122.171874 87.890626-14.453126 187.726563 14.246093 212.632813 110.941406 23.035156 89.421875-27.636719 160.019531-84.46875 187.773437-34.863281 17.023438-82.242187 22.070313-110.667969-14.824219l-18.546875-24.070312-7.820312 29.359375c-10.328125 38.734375-27.03125 104.492187-53.863281 139.636719-5.269532-43.472656 14.320312-116.078125 26.824218-162.410156 11.9375-44.230469 16.621094-62.625 12.628906-73.828126-8.074218-22.660156-8.320312-42.96875-.753906-62.09375 8.476563-21.410156 26.554688-30.234374 41.535156-26.921874 5.410157 1.199218 17.882813 5.871093 16.859376 23.386718-1.515626 25.910156-15.984376 66.6875-23.703126 92.53125-8.105468 27.128906 2.359376 53.21875 26.664063 66.46875 27.3125 14.886719 68.316406 10.390625 97.90625-24.179687 18.21875-21.289063 29.660156-46.984375 36.003906-80.867188 4.90625-26.195312 3.742188-50.28125-3.457031-71.597656-6.695312-19.828125-18.40625-36.84375-34.804688-50.578125-77.382812-64.792969-233.136718-35.035156-248.882812 65.820312-5.605469 26.367188-4.6875 53.8125 2.722656 81.640626-1.191406 5.21875-2.882812 11.902343-4.675781 18.773437-20.871094-24.542969-29.160156-63.109375-20.773437-102.789063zm0 0"></path>
                                    </svg>
                                </a>
                            </span>
                            <span class="elementor-grid-item" role="listitem">
                                <a class="elementor-icon elementor-social-icon elementor-social-icon- elementor-repeater-item-0fa3286" target="_blank">
                                    <span class="elementor-screen-only"></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -47 512.00004 512">
                                        <path d="m512 55.964844c-32.207031 1.484375-31.503906 1.363281-35.144531 1.667968l19.074219-54.472656s-59.539063 21.902344-74.632813 25.820313c-39.640625-35.628907-98.5625-37.203125-140.6875-11.3125-34.496094 21.207031-53.011719 57.625-46.835937 100.191406-67.136719-9.316406-123.703126-41.140625-168.363282-94.789063l-14.125-16.964843-10.554687 19.382812c-13.339844 24.492188-17.769531 52.496094-12.476563 78.851563 2.171875 10.8125 5.863282 21.125 10.976563 30.78125l-12.117188-4.695313-1.4375 20.246094c-1.457031 20.566406 5.390625 44.574219 18.320313 64.214844 3.640625 5.53125 8.328125 11.605469 14.269531 17.597656l-6.261719-.960937 7.640625 23.199218c10.042969 30.480469 30.902344 54.0625 57.972657 67.171875-27.035157 11.472657-48.875 18.792969-84.773438 30.601563l-32.84375 10.796875 30.335938 16.585937c11.566406 6.324219 52.4375 27.445313 92.820312 33.78125 89.765625 14.078125 190.832031 2.613282 258.871094-58.664062 57.308594-51.613282 76.113281-125.03125 72.207031-201.433594-.589844-11.566406 2.578125-22.605469 8.921875-31.078125 12.707031-16.964844 48.765625-66.40625 48.84375-66.519531zm-72.832031 48.550781c-10.535157 14.066406-15.8125 32.03125-14.867188 50.578125 3.941407 77.066406-17.027343 136.832031-62.328125 177.628906-52.917968 47.660156-138.273437 66.367188-234.171875 51.324219-17.367187-2.722656-35.316406-8.820313-50.171875-14.910156 30.097656-10.355469 53.339844-19.585938 90.875-37.351563l52.398438-24.800781-57.851563-3.703125c-27.710937-1.773438-50.785156-15.203125-64.96875-37.007812 7.53125-.4375 14.792969-1.65625 22.023438-3.671876l55.175781-15.367187-55.636719-13.625c-27.035156-6.621094-42.445312-22.796875-50.613281-35.203125-5.363281-8.152344-8.867188-16.503906-10.96875-24.203125 5.578125 1.496094 12.082031 2.5625 22.570312 3.601563l51.496094 5.09375-40.800781-31.828126c-29.398437-22.929687-41.179687-57.378906-32.542969-90.496093 91.75 95.164062 199.476563 88.011719 210.320313 90.527343-2.386719-23.183593-2.449219-23.238281-3.074219-25.445312-13.886719-49.089844 16.546875-74.015625 30.273438-82.453125 28.671874-17.621094 74.183593-20.277344 105.707031 8.753906 6.808593 6.265625 16.015625 8.730469 24.632812 6.589844 7.734375-1.921875 14.082031-3.957031 20.296875-6.171875l-12.9375 36.945312 16.515625.011719c-3.117187 4.179688-6.855469 9.183594-11.351562 15.183594zm0 0"></path>
                                    </svg>
                                </a>
                            </span>
                            <span class="elementor-grid-item" role="listitem">
                                <a class="elementor-icon elementor-social-icon elementor-social-icon- elementor-repeater-item-ddee48a" target="_blank">
                                    <span class="elementor-screen-only"></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="m123.832031 475.464844c39.558594 23.804687 84.789063 36.351562 131.261719 36.351562 140.824219 0 256.90625-114.914062 256.90625-255.910156 0-140.832031-115.917969-255.90625-256.90625-255.90625-140.558594 0-254.910156 114.800781-254.910156 255.90625 0 47.09375 12.550781 92.667969 36.351562 132.257812l-36.535156 123.835938zm-93.65625-219.558594c0-124.570312 100.898438-225.917969 224.917969-225.917969 125.121094 0 226.917969 101.347657 226.917969 225.917969 0 124.574219-101.796875 225.917969-226.917969 225.917969-43.054688 0-84.894531-12.195313-120.984375-35.273438l-5.765625-3.683593-83.988281 24.78125 24.777343-83.992188-3.683593-5.761719c-23.078125-36.097656-35.273438-78.277343-35.273438-121.988281zm0 0"></path>
                                        <path d="m124.628906 208.753906c4.953125 26.011719 19.65625 76.042969 62.464844 118.851563 42.808594 42.808593 92.839844 57.515625 118.855469 62.46875 29.789062 5.671875 73.503906 6.527343 94.867187-14.835938l11.910156-11.910156c6.011719-6.011719 9.324219-14.007813 9.324219-22.511719s-3.3125-16.496094-9.324219-22.507812l-47.628906-47.628906c-6.015625-6.015626-14.007812-9.324219-22.511718-9.324219-8.503907 0-16.496094 3.308593-22.511719 9.324219l-11.90625 11.90625c-7.273438 7.273437-21.003907 7.304687-28.332031.089843l-47.507813-49.5c-.070313-.074219-.140625-.148437-.214844-.21875-7.285156-7.285156-7.285156-19.140625 0-26.425781l11.90625-11.90625c12.445313-12.445312 12.445313-32.582031 0-45.023438l-47.628906-47.628906c-12.410156-12.410156-32.605469-12.410156-45.019531 0l-11.90625 11.910156v-.003906c-17.050782 17.054688-22.734375 53.40625-14.835938 94.875zm36.042969-73.664062c12.5-12.214844 11.832031-12.449219 13.210937-12.449219.472657 0 .945313.179687 1.304688.539063 50.1875 50.457031 48.171875 47.492187 48.171875 48.9375 0 .503906-.183594.945312-.539063 1.304687l-11.910156 11.90625c-18.964844 18.964844-19.039062 49.664063-.121094 68.714844l47.535157 49.53125c.074219.070312.144531.144531.21875.21875 18.960937 18.960937 51.808593 19.023437 70.832031 0l11.90625-11.90625c.71875-.71875 1.890625-.71875 2.609375 0 50.1875 50.453125 48.171875 47.488281 48.171875 48.933593 0 .507813-.183594.945313-.539062 1.304688l-11.910157 11.90625c-8.160156 8.160156-34.152343 13.042969-68.054687 6.585938-22.625-4.3125-66.128906-17.085938-103.257813-54.214844-37.128906-37.128906-49.902343-80.632813-54.210937-103.257813-6.460938-33.902343-1.578125-59.898437 6.582031-68.054687zm0 0"></path>
                                    </svg>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-8ddf5b6 e-con-full e-flex e-con e-child" data-id="8ddf5b6" data-element_type="container" data-e-type="container">
                    <?php $map = get_field('map'); if ($map) : ?>
                        <div class="elementor-element elementor-element-e336356 e-flex e-con-boxed e-con e-child" data-id="e336356" data-element_type="container" data-e-type="container">
                            <div class="e-con-inner">
                                <div class="elementor-element elementor-element-0c4add6 elementor-widget elementor-widget-google_maps" data-id="0c4add6" data-element_type="widget" data-e-type="widget" data-widget_type="google_maps.default">
                                    <div class="elementor-custom-embed">
                                        <?php echo $map; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="elementor-element elementor-element-c8f6da9 e-con-full e-flex e-con e-child" data-id="c8f6da9" data-element_type="container" data-e-type="container">
                        <?php $address = get_field('address'); if ($address) : ?>
                            <div class="elementor-element elementor-element-f7b7fa6 e-con-full e-flex e-con e-child" data-id="f7b7fa6" data-element_type="container" data-e-type="container">
                                <div class="elementor-element elementor-element-ce4e19e electron-transform transform-type-translate elementor-widget elementor-widget-heading" data-id="ce4e19e" data-element_type="widget" data-e-type="widget" data-widget_type="heading.default">
                                    <h5 class="elementor-heading-title elementor-size-default">Адрес</h5>
                                </div>
                                <?php echo $address; ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php $support = get_field('support'); if ($support) : ?>
                            <div class="elementor-element elementor-element-8c65b56 e-con-full e-flex e-con e-child" data-id="8c65b56" data-element_type="container" data-e-type="container">
                                <div class="elementor-element elementor-element-ada0531 electron-transform transform-type-translate elementor-widget elementor-widget-heading" data-id="ada0531" data-element_type="widget" data-e-type="widget" data-widget_type="heading.default">
                                    <h5 class="elementor-heading-title elementor-size-default">Поддержка</h5>
                                </div>
                                <?php echo $support; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php $form_id = get_field('form'); if ($form_id) : ?>
                        <div class="elementor-element elementor-element-752ebd7 e-con-full e-flex e-con e-child" data-id="752ebd7" data-element_type="container" data-e-type="container">
                            <div class="elementor-element elementor-element-621372c e-con-full e-flex e-con e-child" data-id="621372c" data-element_type="container" data-e-type="container">
                                <div class="elementor-element elementor-element-5cf6b89 electron-transform transform-type-translate elementor-widget elementor-widget-heading" data-id="5cf6b89" data-element_type="widget" data-e-type="widget" data-widget_type="heading.default">
                                    <h5 class="elementor-heading-title elementor-size-default">Отправить сообщение</h5>
                                </div>
                                <div class="elementor-element elementor-element-a54bcb3 elementor-widget elementor-widget-electron-contact-form-7" data-id="a54bcb3" data-element_type="widget" data-e-type="widget" data-widget_type="electron-contact-form-7.default">
                                    <div class="elementor-widget-container">
                                        <div class="electron-cf7-form-wrapper form_front">
                                            <?php echo do_shortcode('[contact-form-7 id="' . $form_id . '"]'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; endif; ?>

<script type="text/javascript" id="elementor-frontend-js-before">
/* <![CDATA[ */
var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false,"isScriptDebug":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close","a11yCarouselPrevSlideMessage":"Previous slide","a11yCarouselNextSlideMessage":"Next slide","a11yCarouselFirstSlideMessage":"This is the first slide","a11yCarouselLastSlideMessage":"This is the last slide","a11yCarouselPaginationBulletMessage":"Go to slide"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"responsive":{"breakpoints":{"mobile":{"label":"Mobile Portrait","value":767,"default_value":767,"direction":"max","is_enabled":true},"mobile_extra":{"label":"Mobile Landscape","value":880,"default_value":880,"direction":"max","is_enabled":true},"tablet":{"label":"Tablet Portrait","value":1024,"default_value":1024,"direction":"max","is_enabled":true},"tablet_extra":{"label":"Tablet Landscape","value":1200,"default_value":1200,"direction":"max","is_enabled":true},"laptop":{"label":"Laptop","value":1400,"default_value":1366,"direction":"max","is_enabled":true},"widescreen":{"label":"Widescreen","value":2400,"default_value":2400,"direction":"min","is_enabled":true}},"hasCustomBreakpoints":true},"version":"3.35.6","is_static":false,"experimentalFeatures":{"e_font_icon_svg":true,"additional_custom_breakpoints":true,"container":true,"e_optimized_markup":true,"nested-elements":true,"home_screen":true,"global_classes_should_enforce_capabilities":true,"e_variables":true,"cloud-library":true,"e_opt_in_v4_page":true,"e_components":true,"e_interactions":true,"e_editor_one":true,"import-export-customization":true},"urls":{"assets":"https:\/\/electron.ninetheme.com\/wp-content\/plugins\/elementor\/assets\/","ajaxurl":"https:\/\/electron.ninetheme.com\/wp-admin\/admin-ajax.php","uploadUrl":"https:\/\/electron.ninetheme.com\/wp-content\/uploads"},"nonces":{"floatingButtonsClickTracking":"23d4d1c0eb"},"swiperClass":"swiper","settings":{"page":[],"editorPreferences":[]},"kit":{"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop","viewport_widescreen"],"viewport_laptop":1400,"viewport_widescreen":2400,"lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":13954,"title":"Contact%20%E2%80%93%20NineTheme%20Creative%20Agency","excerpt":"","featuredImage":false}};
//# sourceURL=elementor-frontend-js-before
/* ]]> */
</script>

<?php get_footer(); ?>