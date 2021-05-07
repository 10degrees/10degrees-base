<?php

namespace App\Dynamic_Blocks;

use App\Models\WPQueryBuilder;
use App\Support\Gutenberg\DynamicBlock;

class LatestPosts extends DynamicBlock {

    protected $name = 'theme/latest-posts';

    protected $attributes = [
        'numberOfPosts' => [
            'type' => 'number',
            'default' => 3,
        ]
    ];

    public function render($attributes, $content)
    {
        $posts = (new WPQueryBuilder)->take($attributes['numberOfPosts'])->get();
    
        return td_view('partials/blocks/latest-posts', [
            'posts' => $posts
        ]);
    }
}
