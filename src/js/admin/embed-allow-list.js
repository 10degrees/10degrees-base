/**
 * Set the list of allowed embeds
 * 
 * @link https://wordpress.stackexchange.com/questions/379612/how-to-remove-the-core-embed-blocks-in-wordpress-5-6
 */
class EmbedAllowList {
    constructor() {
        /**
         * The allowed embed types
         *
         * @var {array}
         */
        this.allowedVariations = [
            'youtube',
            'twitter',
            'vimeo',
        ];

        this.blockEmbeds();
    }

    /**
     * Block embeds except those specified
     *
     * @return  {void}
     */
    blockEmbeds(){
        wp.blocks.getBlockVariations('core/embed').forEach((blockVariation) => {
            if(-1 === this.allowedVariations.indexOf(blockVariation.name)){
                wp.blocks.unregisterBlockVariation('core/embed', blockVariation.name);
            }
        });
    }
}

export default EmbedAllowList;