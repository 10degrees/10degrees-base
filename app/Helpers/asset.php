<?php
/**
 * Get cache-busting hashed filename from rev-manifest.json.
 *
 * @param string $filename Original name of the file.
 *
 * @return string Current cache-busting hashed name of the file.
 */
function td_asset_path($filename)
{
    //@TODO capitalize this function

    // Cache the decoded manifest so that we only read it in once.
    static $manifest = null;
    if (null === $manifest) {
        $manifest_path = get_stylesheet_directory() . '/dist/mix-manifest.json';
        $manifest = file_exists($manifest_path)
            ? json_decode(file_get_contents($manifest_path), true)
            : [];
    }
    // If the manifest contains the requested file, return the hashed name.
    if (array_key_exists('/' . $filename, $manifest)) {
        return '/dist/' . $manifest['/' . $filename];
    }

    // Assume the file has not been hashed when it was not found within the
    // manifest.
    return $filename;
}

/**
 * Quick way to asset path.
 *
 * @param string $filePath - Optional
 *
 * @return string - path to file (or just directory)
 */
function td_img_path($filePath = '')
{
    return get_stylesheet_directory_uri() . '/dist/img/' . $filePath;
}

/**
 * Get SVG from dist/img
 *
 * Returns the SVG, the whole SVG and nothing
 * but the SVG, so help me Matt Mullenweg.
 *
 * @param $svg string File name & relative path e.g. social-icons/facebook. If no .svg on the end
 * it will automatically be added.
 *
 * @return string The SVG XML markup
 */
function td_get_svg($svg)
{
    if (false === strpos($svg, '.svg')) {
        $svg .= '.svg';
    }

    ob_start();

    $imagePath = td_img_path($svg);
    $icon = str_replace(site_url(), '', $imagePath);
    include ABSPATH . $icon;

    return ob_get_clean();
}