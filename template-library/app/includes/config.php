<?php

const APP_TIMEZONE = 'UTC';

date_default_timezone_set(APP_TIMEZONE);

$basePath = dirname(__DIR__, 2);

define('BASE_PATH', $basePath);
define('DATA_PATH', BASE_PATH . '/data');
define('TEMPLATE_DATA_FILE', DATA_PATH . '/templates.json');
define('USER_DATA_FILE', DATA_PATH . '/users.json');
define('UPLOADS_PATH', BASE_PATH . '/app/uploads');
define('THUMBNAIL_PATH', UPLOADS_PATH . '/thumbnails');
define('EXPORT_PATH', DATA_PATH . '/exports');

foreach ([DATA_PATH, UPLOADS_PATH, THUMBNAIL_PATH, EXPORT_PATH] as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
}
