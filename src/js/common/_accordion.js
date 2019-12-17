function initializeBlock($block){
    $block.find(".toggle").click(function() {
        var accordion = $(this).parents('.accordion')[0];

        // Show the panel
        $(accordion).toggleClass('-open');
        $(accordion).find('.content').slideToggle();

        // Maintain aria-expanded attribute
        var currentExpanded = $(this).attr('aria-expanded');
        (currentExpanded === "true") ? $(this).attr('aria-expanded', "false") : $(this).attr('aria-expanded', "true");
    });
}

$(document).ready(function(){ 
   $('.accordion').each(function(){
       initializeBlock($(this));
   })
    
});

if( window.acf ) {
    window.acf.addAction( 'render_block_preview/type=accordion', initializeBlock);
}