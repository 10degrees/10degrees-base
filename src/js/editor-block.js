
import 'alpinejs';

// Admin-Specific JS
import DisableAlignment from './admin/disable-alignment';
import RegisterBlockStyles from './admin/register-block-styles';
import UnregisterBlockStyles from "./admin/unregister-block-styles";
import EmbedAllowList from './admin/embed-allow-list';

class BlockEditor {
    constructor(){
        this.initBlocks();

        wp.domReady(this.handleDomReady)
    }

    initBlocks(){
        new DisableAlignment();
    }

    handleDomReady(){
        new UnregisterBlockStyles();
        new RegisterBlockStyles();
        new EmbedAllowList();
    }
}

new BlockEditor();