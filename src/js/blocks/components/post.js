import { Component } from '@wordpress/element';
import {select, withSelect} from '@wordpress/data';

class Post extends Component {
    render() {
        const {title, excerpt, link, image} = this.props;

        let imageElement = null
        if(image && image.source_url) {
            imageElement = <img src={image.source_url} />;
        }

        return (
            <div>
                {imageElement}
                <p>{title}</p>
                <p>{excerpt}</p>
                <a href={link}>Read More</a>
            </div>
        )
    }
}

export default withSelect((select, props) => {
    return {
      image: props.featuredImage ? select('core').getMedia(props.featuredImage) : null,
    };
})(Post)