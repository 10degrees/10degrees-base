import Block from "./block";
import {__} from '@wordpress/i18n';
import {Icon} from '@wordpress/components';
import {select, withSelect} from '@wordpress/data';
import {registerBlockType} from '@wordpress/blocks';
import {useBlockProps} from '@wordpress/block-editor';
import Post from './components/post';

class LatestPosts extends Block {

    constructor() {
        super();

        this.name = "theme/latest-posts";
        this.meta = {
            title: __("Latest Posts", "@textdomain"),

            icon: <Icon icon="format-aside" />,
            category: "theme",
            keywords: [__("latest", "@textdomain"), __("posts", "@textdomain")],
        };

        this.registerBlock();
    }

    registerBlock(){
        this.setAttributes();

        registerBlockType(this.name, {
            ...this.meta,
            attributes: this.attributes,

            edit: withSelect(select => {
                return {
                    posts: select('core').getEntityRecords('postType', 'post', {
                        per_page: 3
                    })
                }
            })(this.edit),
            save: this.save,

            // Set alignment when the editor is loaded
            getEditWrapperProps( attributes ) {
                const { align } = attributes;
                if ( 'left' === align || 'right' === align || 'wide' === align || 'full' === align ) {
                    return { 'data-align': align };
                }
            }
        });
    }

    edit({posts}) {
        if(!posts) {
            return <p>Loading...</p>
        }

        let postComponents = posts.map(post => (
            <Post 
                title={post.title.raw}
                excerpt={post.excerpt.raw}
                link={post.link}
                featuredImage={post.featured_media} />
        ));

        return (
            <div class="latest-posts">
                {postComponents}
            </div>
        );
    }

    save() {
        return null;
    }
}

new LatestPosts();