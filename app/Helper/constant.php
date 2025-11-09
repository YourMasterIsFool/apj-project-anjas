<?php

if (! defined('TRAFFIC_TYPES')) {
    define('TRAFFIC_TYPES', [
        'simpang_tiga',
        'simpang_empat',
        'bundaran',
        'lampu_pedestrian',
    ]);
}

if (! defined('LAMP_TYPES')) {
    define('LAMP_TYPES', [
        'merah',
        'kuning',
        'hijau',
    ]);
}

if (! defined('ROAD_STATUS')) {
    define('ROAD_STATUS', [
        'aktif',
        'tidak_aktif',
        'perbaikan',
    ]);
}
