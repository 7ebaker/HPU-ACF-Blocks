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
        //alert('apply-visit-request block initialized');
        //  Set the Cookie
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

// Get the Cookie
function getCookie(cname) {
    var name = cname + "=";
    var ca   = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var  c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if ( c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

// Check if Cookie exists
function checkCookie() {

    // Get the cookie called "visited"
    var visited = getCookie("visited");

    // If it exists, print the Cookie to the Console
    if (visited == "true") {
        console.log(document.cookie);
    }
    else {
        // If not, add the class 'is-visible' to my modal called '.mhc-intro-modal'
        // and create a the cookie "visited=true" expiring in 15 days.
        $('.mhc-intro-modal').addClass('is-visible');
        $('body').addClass('hide-overflow');
        setCookie("visited", "true", 15);
    }
}

// When document is ready check for the cookie
$(document).ready(function() {
    checkCookie();
});

// Close the modal
$('.mhc-intro-modal').on('click', function(event) {
    if ( $(event.target).is('.mhc-intro-modal-close') || $(event.target).is('.mhc-intro-modal') ) {
        event.preventDefault();
        $(this).removeClass('is-visible');
        $('body').removeClass('hide-overflow');
    }
});
        
    }

    // Initialize each block on page load (front end).
    $(document).ready(function(){
        $('.apply-visit-request').each(function(){
            initializeBlock( $(this) );
        });
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=block-apply-visit-request', initializeBlock );
    }

})(jQuery);