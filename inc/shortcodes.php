<?php
function postwp_faq_shortcode($atts, $content = null) {
    $atts = shortcode_atts([
        'id'    => null,
        'class' => ''
    ], $atts);
    $id = $atts['id'];
    $class = $atts['class'];
    $content = do_shortcode($content);
    return <<<HTML
        <div class="accordion{$class}" id="$id">
            $content
        </div>
    HTML;
}
add_shortcode('postwp_faq', 'postwp_faq_shortcode');

function postwp_faq_item_shortcode($atts, $content = null) {
    $atts = shortcode_atts([
        'id'        => null,
        'parent_id' => null,
        'question'  => null,
        'show'      => false,
    ], $atts);

    $id = $atts['id'];
    $parent_id = $atts['parent_id'];
    $question = $atts['question'];

    $collapsed = ' collapsed';
    $show = '';
    $expanded = 'false';
    if ($atts['show']) {
        $collapsed = '';
        $show = ' show';
        $expanded = 'true';
    }

    return <<<HTML
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button{$collapsed}" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapse-$id" aria-expanded="$expanded" aria-controls="faq-collapse-$id">
                    $question
                </button>
            </h2>
            <div id="faq-collapse-$id" class="accordion-collapse collapse{$show}" data-bs-parent="#{$parent_id}">
                <div class="accordion-body">
                    $content
                </div>
            </div>
        </div>
    HTML;
}
add_shortcode('postwp_faq_item', 'postwp_faq_item_shortcode');