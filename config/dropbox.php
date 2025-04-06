<?php

return [

    'clientId' => env('DROPBOX_CLIENT_ID'),

    'clientSecret' => env('DROPBOX_SECRET_ID'),

    'redirectUri' => env('DROPBOX_OAUTH_URL'),

    'landingUri' => env('DROPBOX_LANDING_URL', '/'),

    'accessToken' => env('DROPBOX_ACCESS_TOKEN', ''),

    'accessType' => env('DROPBOX_ACCESS_TYPE', 'offline'),

    'scopes' => 'account_info.read files.metadata.write files.metadata.read files.content.write files.content.read',
];
