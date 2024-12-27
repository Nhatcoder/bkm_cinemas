<?php

/*
|--------------------------------------------------------------------------
| Laravel File Manager Configuration
|--------------------------------------------------------------------------
| Documentation for this config :
| online  => http://unisharp.github.io/laravel-filemanager/config
| offline => vendor/unisharp/laravel-filemanager/docs/config.md
*/

return [
    /*
    |--------------------------------------------------------------------------
    | Routing
    |--------------------------------------------------------------------------
    | Enable or disable package routes
    */
    'use_package_routes' => false,

    /*
    |--------------------------------------------------------------------------
    | Shared folder / Private folder
    |--------------------------------------------------------------------------
    | If both options are set to false, the shared folder will be activated.
    */
    'allow_private_folder' => true,
    'private_folder_name' => UniSharp\LaravelFilemanager\Handlers\ConfigHandler::class,
    'allow_shared_folder' => true,
    'shared_folder_name' => 'shares',

    /*
    |--------------------------------------------------------------------------
    | Folder Names
    |--------------------------------------------------------------------------
    | Define the folder settings for files and images
    */
    'folder_categories' => [
        'file' => [
            'folder_name' => 'uploads',
            'startup_view' => 'list',
            'max_size' => 50000, // size in KB (50MB)
            'thumb' => true,
            'thumb_width' => 80,
            'thumb_height' => 80,
            'valid_mime' => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'application/pdf',
                'text/plain',
            ],
        ],
        'image' => [
            'folder_name' => 'uploads',
            'startup_view' => 'grid',
            'max_size' => 50000, // size in KB (50MB)
            'thumb' => true,
            'thumb_width' => 80,
            'thumb_height' => 80,
            'valid_mime' => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Pagination
    |--------------------------------------------------------------------------
    | Items per page in the file manager
    */
    'paginator' => [
        'perPage' => 30,
    ],

    /*
    |--------------------------------------------------------------------------
    | Upload / Validation
    |--------------------------------------------------------------------------
    | Upload configuration
    */
    'disk' => 'public', // Disk to store uploaded files
    'rename_file' => false,
    'rename_duplicates' => false,
    'alphanumeric_filename' => false,
    'alphanumeric_directory' => false,
    'should_validate_size' => false, // Validate file size
    'should_validate_mime' => true, // Validate file mime type

    // Behavior on files with identical names
    'over_write_on_duplicate' => false,

    // Disallowed mimetypes and extensions
    'disallowed_mimetypes' => ['text/x-php', 'text/html', 'text/plain'],
    'disallowed_extensions' => ['php', 'html'],

    // Item Columns for the file manager view
    'item_columns' => ['name', 'url', 'time', 'icon', 'is_file', 'is_image', 'thumb_url'],

    /*
    |--------------------------------------------------------------------------
    | Thumbnail
    |--------------------------------------------------------------------------
    | Thumbnail generation settings
    */
    'should_create_thumbnails' => true,
    'thumb_folder_name' => 'thumbs',

    // Create thumbnails automatically for listed types
    'raster_mimetypes' => [
        'image/jpeg',
        'image/pjpeg',
        'image/png',
    ],
    'thumb_img_width' => 200, // Thumbnail width in pixels
    'thumb_img_height' => 200, // Thumbnail height in pixels

    /*
    |--------------------------------------------------------------------------
    | File Extension Information
    |--------------------------------------------------------------------------
    | File type descriptions
    */
    'file_type_array' => [
        'pdf' => 'Adobe Acrobat',
        'doc' => 'Microsoft Word',
        'docx' => 'Microsoft Word',
        'xls' => 'Microsoft Excel',
        'xlsx' => 'Microsoft Excel',
        'zip' => 'Archive',
        'gif' => 'GIF Image',
        'jpg' => 'JPEG Image',
        'jpeg' => 'JPEG Image',
        'png' => 'PNG Image',
        'ppt' => 'Microsoft PowerPoint',
        'pptx' => 'Microsoft PowerPoint',
    ],

    /*
    |--------------------------------------------------------------------------
    | php.ini overrides
    |--------------------------------------------------------------------------
    | These values override your php.ini settings before uploading files
    */
    'php_ini_overrides' => [
        'memory_limit' => '256M', // Memory limit for file uploads
    ],
];
