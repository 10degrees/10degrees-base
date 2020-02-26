<?php

namespace App\Services;

use App\Inc\Singleton;

/**
 * Provides a facility for using "geo_query" as a WP_Query arg
 *
 * //@TODO document how this works
 * //@TODO refactor to camel method names
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class GeoQuery extends Singleton
{
    /*
     * Constructor
     */
    protected function __construct()
    {
        add_filter('posts_fields', array( $this, 'posts_fields'  ), 10, 2);
        add_filter('posts_join', array( $this, 'posts_join'    ), 10, 2);
        add_filter('posts_where', array( $this, 'posts_where'   ), 10, 2);
        add_filter('posts_orderby', array( $this, 'posts_orderby' ), 10, 2);
    }

    /**
     * Add calculated "distance" parameter to sql query, haversine formula
     *
     * @param [type] $sql
     * @param [type] $query
     *
     * //@TODO find out how this works and populate
     *
     * @return void
     */
    public function posts_fields($sql, $query)
    {
        global $wpdb;
        $geo_query = $query->get('geo_query');
        if ($geo_query) {
            if ($sql) {
                $sql .= ', ';
            }
            $sql .= $this->haversine_term($geo_query) . " AS geo_query_distance";
        }
        return $sql;
    }

    public function posts_join($sql, $query)
    {
        global $wpdb;
        $geo_query = $query->get('geo_query');
        if ($geo_query) {
            if ($sql) {
                $sql .= ' ';
            }
            $sql .= "INNER JOIN " . $wpdb->prefix . "postmeta AS geo_query_lat ON ( " . $wpdb->prefix . "posts.ID = geo_query_lat.post_id ) ";
            $sql .= "INNER JOIN " . $wpdb->prefix . "postmeta AS geo_query_lng ON ( " . $wpdb->prefix . "posts.ID = geo_query_lng.post_id ) ";
        }
        return $sql;
    }

    /**
     * match on the right metafields, and filter by distance
     */
    public function posts_where($sql, $query)
    {
        global $wpdb;
        $geo_query = $query->get('geo_query');
        if ($geo_query) {
            $lat_field = 'latitude';
            if (!empty($geo_query['lat_field'])) {
                $lat_field =  $geo_query['lat_field'];
            }
            $lng_field = 'longitude';
            if (!empty($geo_query['lng_field'])) {
                $lng_field =  $geo_query['lng_field'];
            }
            $distance = 20;
            if (isset($geo_query['distance'])) {
                $distance = $geo_query['distance'];
            }
            if ($sql) {
                $sql .= " AND ";
            }
            $haversine = $this->haversine_term($geo_query);
            $new_sql = "( geo_query_lat.meta_key = %s AND geo_query_lng.meta_key = %s AND " . $haversine . " <= %f )";
            $sql .= $wpdb->prepare($new_sql, $lat_field, $lng_field, $distance);
        }
        return $sql;
    }

    /**
     * Handle ordering
     */
    public function posts_orderby($sql, $query)
    {
        $geo_query = $query->get('geo_query');
        if ($geo_query) {
            $orderby = $query->get('orderby');
            $order   = $query->get('order');
            if ($orderby == 'distance') {
                if (!$order) {
                    $order = 'ASC';
                }
                $sql = 'geo_query_distance ' . $order;
            }
        }
        return $sql;
    }

    public static function the_distance($post_obj = null, $round = false)
    {
        echo self::get_the_distance($post_obj, $round);
    }

    public static function get_the_distance($post_obj = null, $round = false)
    {
        global $post;
        if (!$post_obj) {
            $post_obj = $post;
        }
        if (property_exists($post_obj, 'geo_query_distance')) {
            $distance = $post_obj->geo_query_distance;
            if ($round !== false) {
                $distance = round($distance, $round);
            }
            return $distance;
        }
        return false;
    }

    private function haversine_term($geo_query)
    {
        global $wpdb;
        $units = "miles";
        if (!empty($geo_query['units'])) {
            $units = strtolower($geo_query['units']);
        }
        $radius = 3959;
        if (in_array($units, array( 'km', 'kilometers' ))) {
            $radius = 6371;
        }
        $lat_field = "geo_query_lat.meta_value";
        $lng_field = "geo_query_lng.meta_value";
        $lat = 0;
        $lng = 0;
        if (isset($geo_query['latitude'])) {
            $lat = $geo_query['latitude' ];
        }
        if (isset($geo_query['longitude'])) {
            $lng = $geo_query['longitude'];
        }
        $haversine  = "( " . $radius . " * ";
        $haversine .=     "acos( cos( radians(%f) ) * cos( radians( " . $lat_field . " ) ) * ";
        $haversine .=     "cos( radians( " . $lng_field . " ) - radians(%f) ) + ";
        $haversine .=     "sin( radians(%f) ) * sin( radians( " . $lat_field . " ) ) ) ";
        $haversine .= ")";
        $haversine  = $wpdb->prepare($haversine, array( $lat, $lng, $lat ));
        return $haversine;
    }
}
