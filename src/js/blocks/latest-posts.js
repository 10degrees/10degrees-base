import Block from "./block";
import {__} from '@wordpress/i18n';
import {Icon, TextControl} from '@wordpress/components';
import {select, withSelect} from '@wordpress/data';
import {registerBlockType} from '@wordpress/blocks';
import {InspectorControls, useBlockProps} from '@wordpress/block-editor';
import {PanelBody, PanelRow} from '@wordpress/components';
import Post from './components/post';

class LatestPosts extends Block {

    constructor() {
        super();

        this.name = "theme/latest-posts";
        this.meta = {
            title: __("Latest Posts", "@textdomain"),
            apiVersion: 2,
            icon: <Icon icon="format-aside" />,
            category: "theme",
            keywords: [__("latest", "@textdomain"), __("posts", "@textdomain")],
        };

        this.attributes = {
            numberOfPosts: {
                type: 'integer',
                default: 3
            }
        }

        this.registerBlock();
    }

    registerBlock(){
        this.setAttributes();

        registerBlockType(this.name, {
            ...this.meta,
            attributes: this.attributes,

            edit: withSelect((select, props) => {
                return {
                    posts: select('core').getEntityRecords('postType', 'post', {
                        per_page: props.attributes.numberOfPosts
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

    edit({posts, attributes, setAttributes, className}) {
        let {numberOfPosts} = attributes;

        if(!posts) {
            return <p>Loading...</p>
        }

        let postComponents = posts.map(post => (
            <Post 
                title={post.title.raw}
                excerpt={post.excerpt.rendered}
                link={post.link}
                featuredImage={post.featured_media} />
        ));

        return [
            <InspectorControls>
                <PanelBody title={ __("Latest Posts", "@textdomain") }>
                    <PanelRow>
                        <TextControl
                            label={__('Number of posts')}
                            value={numberOfPosts}
                            type="number"
                            onChange={val => setAttributes({numberOfPosts: parseInt(val)})}/>
                    </PanelRow>
                </PanelBody>
            </InspectorControls>,
            <div {...useBlockProps({className: className + ' latest-posts'})}>
                {postComponents}
            </div>
        ];
    }

    save() {
        return null;
    }
}

new LatestPosts();