<?php

namespace App\Dynamic_Blocks;

use App\Models\Post;
use App\Models\WPQueryBuilder;
use App\Support\Gutenberg\DynamicBlock;

class LatestPosts extends DynamicBlock {

    protected $name = 'theme/latest-posts';

    public function render($attributes, $content)
    {
        $posts = (new WPQueryBuilder)->take(3)->get();
        

        return td_view('partials/blocks/latest-posts', [
            'posts' => $posts
        ]);
    }
}
