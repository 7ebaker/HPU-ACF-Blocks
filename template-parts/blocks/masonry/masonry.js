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
        var $grid = $block.find('.grid').masonry({
            // options
            itemSelector: '.grid-item',
            columnWidth: 300,
            isFitWidth: true
        }); 
        
        $grid.imagesLoaded().progress( function() {
            $grid.masonry('layout');
        });
    }

    // Initialize each block on page load (front end).
    $(document).ready(function(){
        $('.masonry').each(function(){
            initializeBlock( $(this) );
        });
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=masonry', initializeBlock );
    }

})(jQuery);