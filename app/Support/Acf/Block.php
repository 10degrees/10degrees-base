<?php

namespace App\Support\Acf;

/**
 * Abstract block registration
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
abstract class Block
{
    /**
     * A unique name that identifies the block (without namespace)
     *
     * @var string
     */
    protected $name = '';

    /**
     * The block options
     *
     * @var array
     */
    protected $options = [
        'title'       => '',
        'description' => '',
        'icon'        => '',
        'category'    => 'theme',
        'keywords'    => ['theme', 'block'],
        'supports'    => ['align' => ['wide', 'full']],
        'example'  => [
            'attributes' => [
                'mode' => 'preview',
                'data' => [],
            ],
        ],
    ];

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->register();

        add_filter('allowed_block_types_all', [$this, 'allowBlockType'], 999);
    }

    /**
     * Add this block to the allow list of blocks
     *
     * @param array|bool $blocks The list of allowed blocks
     *
     * @return array
     */
    public function allowBlockType($blocks): array
    {
        if (!is_array($blocks)) {
            $blocks = [];
        }
        $blocks[] = 'acf/' . $this->name;

        return $blocks;
    }

    /**
     * Register the block
     *
     * @return void
     */
    protected function register(): void
    {
        acf_register_block($this->getBlockOptions());
    }

    /**
     * Get the options for block registration
     *
     * @return array
     */
    protected function getBlockOptions(): array
    {
        return array_merge(
            $this->options,
            [
                'name'            => $this->name,
                'render_callback' => [$this, 'render'],
            ]
        );
    }

    /**
     * Callback to render ACF blocks
     *
     * @param array  $block   Name of block
     * @param string $content Block content
     * @param bool   $preview Is preview
     * @param int    $postId  The post ID
     *
     * @return void
     */
    public function render(array $block, string $content = '', bool $preview = false, int $postId = 0)
    {
        $post = get_post($postId);

        echo td_view("partials/blocks/{$this->name}", compact('block', 'post'));
    }
}
