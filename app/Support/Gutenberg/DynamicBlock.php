<?php

namespace App\Support\Gutenberg;

abstract class DynamicBlock {
    /**
     * A unique name that identifies the block
     *
     * @var string
     */
    protected $name = '';

    /**
     * The block attributes
     *
     * @var array
     */
    protected $attribute = [];

    public function __construct()
    {
        $this->register();
    }

    public function register()
    {
        register_block_type(
            $this->name,
            [
                'render_callback' => [$this, 'render'],
                'attributes' => $this->attributes,
            ]
        );
    }
}