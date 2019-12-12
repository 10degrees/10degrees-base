<?php

namespace App\Models;

/**
 * Wrapper class for WP_Query
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class WPQueryBuilder
{
    /**
     * Default post type. Can be overridden in extending class for CPT
     *
     * @var string
     */
    protected $postType = 'post';

    /**
     * The WP_Query args
     *
     * @var array
     */
    protected $args = array(
        'tax_query' => [],
        'meta_query' => [],
    );

    /**
     * Instantiate the WP_Query. Should be called last.
     *
     * @return \WP_Query
     */
    public function get()
    {
        return new \WP_Query($this->getArgs());
    }

    /**
     * Alternative to get(). Adds pagination and calls get automatically
     *
     * @param integer $count Paged param
     *
     * @return WP_Query
     */
    public function paginate($count = 20)
    {
        $this->take($count);
        $paged = (get_query_var('page')) ? get_query_var('page') : 1;
        $this->addArg('paged', $paged);
        return $this->get();
    }

    /**
     * Set the posts per page
     *
     * @param int $count Posts per page
     *
     * @return $this
     */
    public function take($count)
    {
        $this->addArg('posts_per_page', $count);
        return $this;
    }

    /**
     * Add an argument to the query. Can be used to add any custom
     * WP_Query parameters that aren't provided by the native API
     *
     * @param string $key   Arg key
     * @param mixed  $value Value to add
     *
     * @return $this
     */
    public function addArg($key, $value)
    {
        $this->args[$key] = $value;
        return $this;
    }

    /**
     * Add a taxonomy argument to the query
     *
     * @param string       $taxonomy Taxonomy slug
     * @param string|array $termIds  Term Ids
     *
     * @return WPQueryBuilder $this An instance of this WPQueryBuilder
     */
    public function addTaxArg($taxonomy, $termIds)
    {
        array_push(
            $this->args['tax_query'],
            array(
                'taxonomy' => $taxonomy,
                'field' => 'term_id',
                'terms' => $termIds,
            )
        );
        return $this;
    }

    /**
     * Alias of addTaxArg for a nicer API
     *
     * @param string       $taxonomy Taxonomy slug
     * @param string|array $termIds  Term IDs
     *
     * @return $this
     */
    public function whereCategory($taxonomy, $termIds)
    {
        $this->addTaxArg($taxonomy, $termIds);
        return $this;
    }

    /**
     * Add a meta argument to the query
     *
     * @param string $key     Field name
     * @param mixed  $value   Field value
     * @param string $compare Compare type
     *
     * @return $this
     */
    public function addMetaArg($key, $value, $compare = '=')
    {
        array_push(
            $this->args['meta_query'],
            array(
                    'key' => $key,
                    'value' => $value,
                    'compare' => $compare,
                )
        );
        return $this;
    }

    /**
     * Alias of addMetaArg() form a nicer API
     *
     * @param string $key     Field name
     * @param mixed  $value   Field value
     * @param string $compare Compare type
     *
     * @return $this
     */
    public function whereMeta($key, $value, $compare = '=')
    {
        $this->addMetaArg($key, $value, $compare);
        return $this;
    }

    /**
     * Add a date_query argument to the query
     *
     * @param array $value A date query
     *
     * @return $this
     */
    public function whereDate($value)
    {
        $this->addArg('date_query', $value);
        return $this;
    }

    //@TODO move compare argument to end of list
    /**
     * Add a datetime meta argument to the query
     *
     * @param string $key     Field name
     * @param string $compare Compare type
     * @param string $date    Date to compare
     *
     * @return $this
     */
    public function whereMetaDate($key, $compare = '=', $date)
    {
        $this->addArg(
            'meta_query',
            [
            'meta_key'          => $key,
            'type'              => 'DATETIME',
            'meta_value'        => $date,
            'meta_compare'      => $compare
            ]
        );
        return $this;
    }

    /**
     * Add WP default search parameter
     *
     * @param string $s Search term
     *
     * @return $this
     */
    public function search($s)
    {
        $this->addArg('s', $s);
        return $this;
    }

    /**
     * Exclude the given post ids
     *
     * @param string|array $ids Post IDs to exclude
     *
     * @return $this
     */
    public function exclude($ids)
    {
        $this->addArg('posts__not_in', $ids);
        return $this;
    }

    /**
     * Set the order by arguments to the query
     *
     * @param string|array $orderby Common params include 'ID', 'title', 'meta_value'
     * @param string|array $order   Most common are ASC/DESC
     * @param string       $metaKey Meta key
     *
     * @see https://developer.wordpress.org/reference/classes/wp_query/#order-orderby-parameters
     *
     * @return $this
     */
    public function orderBy($orderby, $order = null, $metaKey = null)
    {
        if (!is_null($metaKey)) {
            $this->addArg('meta_key', $key);
        }

        $this->addArg('orderby', $orderby);

        if (!is_null($metaKey)) {
            $this->addArg('order', $order);
        }

        return $this;
    }

    /**
     * Get the args for the query. Mostly used internally but
     * left public incase it is helpful for debugging
     *
     * @return array
     */
    public function getArgs()
    {
        return array_merge(
            $this->args,
            [
                'post_type' => $this->postType,
            ]
        );
    }

    /**
     * Order by distance to gthe given longitude/latitude
     *
     * @param integer $latitude  Latitude
     * @param integer $longitude Longitude
     * @param integer $distance  Distance
     * @param string  $units     miles|km|kilometers
     *
     * @return $this
     */
    public function orderByDistance($latitude, $longitude, $distance, $units = 'miles')
    {
        \App\Services\GeoQuery::getInstance();

        $this->addArg(
            'geo_query',
            array(
                'lat_field' => 'lat',
                'lng_field' => 'long',
                'latitude'  => $latitude,
                'longitude' => $longitude,
                'distance'  => $distance,
                'units'     => $units
            )
        );

        $this->orderBy('distance', 'ASC');

        return $this;
    }
}
