<?php

/**
 *
 * Messages for error pages under :
 * resources/views/errors/
 *
 */

return [
    403 => [
        'title' => 'Access Denied',
        'message' => 'You don\'t have the right to access this page.',
    ],
    404 => [
        'title' => 'Page Not Found',
        'message' => 'Sorry, the page you are looking for could not be found.',
    ],
    419 => [
        'title' => 'Page Expired',
        'message' => 'The page has expired due to inactivity. <br/><br/> Please refresh and try again.',
    ],
    429 => [
        'title' => 'Error',
        'message' => 'Too many requests.',
    ],
    500 => [
        'title' => 'Error',
        'message' => 'Whoops, looks like something went wrong.',
    ],
    503 => [
        'title' => 'Service Unavailable',
        'message' => 'Be right back.',
    ],
];
