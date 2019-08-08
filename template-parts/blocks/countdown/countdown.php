<?php

/**
 * Countdown Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */



// Create id attribute allowing for custom "anchor" value.
$id = 'countdown-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'countdown';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}

$date = get_field('datepicker');


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
   
    <div class="clock"></div>
</div>

<script>
    

(function($){

    /**
     * initializeBlock
     *
     * Adds custom JavaScript to the block HTML.
     *
     * @date    15/4/19
     * @since   1.0.0
     *
     * @param   object $block The block jQuery element.
     * @param   object attributes The block attributes (only available when editing).
     * @return  void
     */
    var initializeBlock = function( $block ) {
        today = new Date(); //Current Date
future = new Date("<?php the_field('datepicker'); ?>"); //Set Timer Here
diff = future.getTime()/1000 - today.getTime()/1000;
        $block.find('.clock').FlipClock(diff, {
            // options
            clockFace: 'DailyCounter',
            countdown: true
        }); 
        
    }

    // Initialize each block on page load (front end).
    $(document).ready(function(){
        $('.countdown').each(function(){ //this needs to be the classname of the block
            initializeBlock( $(this) );
        });
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=clock', initializeBlock );
    }

})(jQuery);
</script>