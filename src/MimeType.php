<?php

/**
 * @package php-mime-types
 * @link https://github.com/bayfrontmedia/php-mime-types
 * @author John Robinson <john@bayfrontmedia.com>
 * @copyright 2020 Bayfront Media
 */

namespace Bayfront\MimeTypes;

class MimeType
{

    /*
     * Array of valid MIME types
     * See: https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Common_types
     *
     * Last updated: 2020-07-27
     */

    private static $mime_types = [
        'aac' => 'audio/aac',
        'abw' => 'application/x-abiword',
        'arc' => 'application/x-freearc',
        'avi' => 'video/x-msvideo',
        'azw' => 'application/vnd.amazon.ebook',
        'bin' => 'application/octet-stream',
        'bmp' => 'image/bmp',
        'bz' => 'application/x-bzip',
        'bz2' => 'application/x-bzip2',
        'csh' => 'application/x-csh',
        'css' => 'text/css',
        'csv' => 'text/csv',
        'doc' => 'application/msword',
        'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'eot' => 'application/vnd.ms-fontobject',
        'epub' => 'application/epub+zip',
        'gz' => 'application/gzip',
        'gif' => 'image/gif',
        'htm' => 'text/html',
        'html' => 'text/html',
        'ico' => 'image/vnd.microsoft.icon',
        'ics' => 'text/calendar',
        'jar' => 'application/java-archive',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'js' => 'text/javascript',
        'json' => 'application/json',
        'jsonld' => 'application/ld+json',
        'mid' => 'audio/midi audio/x-midi',
        'midi' => 'audio/midi audio/x-midi',
        'mjs' => 'text/javascript',
        'mp3' => 'audio/mpeg',
        'mpeg' => 'video/mpeg',
        'mpkg' => 'application/vnd.apple.installer+xml',
        'odp' => 'application/vnd.oasis.opendocument.presentation',
        'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        'odt' => 'application/vnd.oasis.opendocument.text',
        'oga' => 'audio/ogg',
        'ogv' => 'video/ogg',
        'ogx' => 'application/ogg',
        'opus' => 'audio/opus',
        'otf' => 'font/otf',
        'png' => 'image/png',
        'pdf' => 'application/pdf',
        'php' => 'application/x-httpd-php',
        'ppt' => 'application/vnd.ms-powerpoint',
        'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        'rar' => 'application/vnd.rar',
        'rtf' => 'application/rtf',
        'sh' => 'application/x-sh',
        'svg' => 'image/svg+xml',
        'swf' => 'application/x-shockwave-flash',
        'tar' => 'application/x-tar',
        'tif' => 'image/tiff',
        'tiff' => 'image/tiff',
        'ts' => 'video/mp2t',
        'ttf' => 'font/ttf',
        'txt' => 'text/plain',
        'vsd' => 'application/vnd.visio',
        'wav' => 'audio/wav',
        'weba' => 'audio/webm',
        'webm' => 'video/webm',
        'webp' => 'image/webp',
        'woff' => 'font/woff',
        'woff2' => 'font/woff2',
        'xhtml' => 'application/xhtml+xml',
        'xls' => 'application/vnd.ms-excel',
        'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'xml' => 'text/xml',
        'xul' => 'application/vnd.mozilla.xul+xml',
        'zip' => 'application/zip',
        '3gp' => 'video/3gpp',
        '3g2' => 'video/3gpp2',
        '7z' => 'application/x-7z-compressed',
        'mp4' => 'video/mp4',
    ];

    /**
     * Return array of all MIME types.
     *
     * @return array
     */

    public static function getMimeTypes(): array
    {
        return self::$mime_types;
    }

    /**
     * Adds new MIME type definitions.
     *
     * @param array $types (Array whose keys are the file extension and values are the MIME type string)
     *
     * @return void
     */

    public static function addMimeType(array $types): void
    {
        self::$mime_types = array_merge(self::getMimeTypes(), $types);
    }

    /**
     * Return extension of a given file, or empty string if not existing.
     *
     * @param string $file
     *
     * @return string
     */

    public static function getExtension(string $file): string
    {

        $extension = explode('.', strrev($file), 2);

        if (isset($extension[1])) { // If a period exists in the filename

            return strtolower(strrev($extension[0]));
        }

        return '';
    }

    /**
     * Checks if a file has a given extension.
     *
     * @param string $extension
     * @param string $file
     *
     * @return bool
     */

    public static function hasExtension(string $extension, string $file): bool
    {
        return self::getExtension($file) == $extension;
    }

    /**
     * Get MIME type from file extension.
     *
     * @param string $extension
     * @param string $default (Default MIME type to return if none found for given extension)
     *
     * @return string
     */

    public static function fromExtension(string $extension, string $default = 'application/octet-stream'): string
    {

        if (array_key_exists($extension, self::$mime_types)) {

            return self::$mime_types[$extension];
        }

        return $default;
    }

    /**
     * Get MIME type from file name.
     *
     * @param string $file
     * @param string $default (Default MIME type to return if none found for given extension)
     *
     * @return string
     */

    public static function fromFile(string $file, string $default = 'application/octet-stream'): string
    {

        $extension = self::getExtension($file);

        if (array_key_exists($extension, self::$mime_types)) {

            return self::$mime_types[$extension];
        }

        return $default;
    }
}
