<?php

namespace T7ix\Mercury;

if (!defined('ABSPATH')) {
    exit;
}

if (!defined('T7IX_THEME_URI')) {
    return;
}

if ( ! class_exists( 'T7ix\Mercury\Filters' ) ) {
    class Filters
    {
        public function __construct() {
            add_filter('render_block', [$this, 'replace_search_block'], 10, 2);
        }

        /**
         * Replace the core search block with a custom search form.
         *
         * @param string $block_content The content of the block.
         * @param array $block         The block data.
         * @return string The modified block content.
         */
        public function replace_search_block(string $block_content, array $block ): string
        {
            if ( 'core/search' === $block['blockName'] && !empty($block['attrs']) && 'header-search' === $block['attrs']['label']) {
                ob_start();
                ?>
                <form role="search" method="get" class="header-search" action="<?php echo esc_url_raw(home_url('/')) ?>">
                    <input type="text" autocomplete="off" class="header-search__input" placeholder="<?php echo esc_attr__('Search...', 't7ix-mercury-lite') ?>" value="<?php echo esc_attr(get_search_query()) ?>" name="s" />
                    <button type="reset" class="header-search__close">
                        <img src="<?php echo App::file_uri('/assets/img/svg/ico-cross.svg') ?>" alt="search-reset" />
                    </button>
                </form>
                <?php
                $block_content = ob_get_clean();
            }
            return $block_content;
        }
    }
}