class Accordion {
    constructor(){
        var $this = this;

        $(document).ready(function(){ 
            $('.accordion').each(function(){
                $this.initializeBlock($(this));
            })
        });
        
        if( window.acf ) {
            window.acf.addAction( 'render_block_preview/type=accordion', $this.initializeBlock);
        }
    }

    initializeBlock($block){
        $block.find(".toggle").click(function() {
            var accordion = $(this).parents('.accordion');
    
            // Show the content
            $(accordion).toggleClass('-open');
            $(accordion).find('.content').slideToggle();
    
            // Set aria-expanded attribute
            var currentExpanded = $(this).attr('aria-expanded');
            (currentExpanded === "true") ? $(this).attr('aria-expanded', "false") : $(this).attr('aria-expanded', "true");
        });
    }
}

export default Accordion;