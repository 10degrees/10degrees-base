<?php

/**
 * Get the terms associated with the given post id
 *
 * @param string  $taxonomy_slug Taxonomy Slug
 * @param boolean $single        Should single result be returned
 * @param string  $fields        Fields to fetch
 *
 * @return array
 */
function td_get_post_terms($taxonomy_slug, $single = false, $fields = 'all')
{
    $terms = wp_get_post_terms(get_the_id(), $taxonomy_slug, array("fields" => $fields));

    if (!count($terms)) {
        return false;
    }

    if ($single) {
        return $terms[0];
    }

    return $terms;
}

/**
 * Get terms of any taxonomy by slug
 *
 * @param string $taxonomy_slug Taxonomy Slug
 *
 * @return array $terms         Array of WP_Term objects
 */
function td_get_terms($taxonomy_slug)
{
    return get_terms(
        array(
            'taxonomy' => $taxonomy_slug,
            'hide_empty' => true,
            'orderby' => 'name'
        )
    );
}

/**
 * Get terms of any taxonomy by slug
 *
 * @param string $taxonomy_slug Taxonomy Slug
 *
 * @return array $terms         Array of WP_Term objects
 */
function td_get_term($taxonomy_slug)
{
    $terms =  get_terms(
        array(
            'taxonomy' => $taxonomy_slug,
        )
    );

    if (count($terms)) {
        return $terms[0];
    }

    return false;
}
