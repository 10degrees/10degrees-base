<?php

namespace App\Support\Composer;

use Composer\Script\Event;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class Composer
{
    public static function postInstall(Event $event): void
    {
        $dir = dirname($event->getComposer()->getConfig()->get('vendor-dir'));

        $textdomain = basename($dir);

        $theme = implode(' ', array_map('ucfirst', explode('-', $textdomain)));

        $iter = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dir)
        );

        foreach ($iter as $file) {
            $path = $file->getPathname();

            if (strpos($path, __FILE__) !== false) {
                continue;
            }

            if (strpos($path, DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR) !== false) {
                continue;
            }

            if (strpos($path, DIRECTORY_SEPARATOR . 'node_modules' . DIRECTORY_SEPARATOR) !== false) {
                continue;
            }

            if ($file->isFile()) {
                $contents = file_get_contents($file);
                $updated = str_replace(['@textdomain', '@theme'], [$textdomain, $theme], $contents);
                if ($updated !== $contents) {
                    file_put_contents($file, $updated);
                }
            }
        }
    }
}
