<?php

    define( "SITE_ROOT", $_SERVER['DOCUMENT_ROOT'] . '/' );
    define ( "SERVER_HOST", $_SERVER["HTTP_HOST"] );
    define ( "SERVER_PROTOCOL", "http" );
    define ( "SERVER_ROOT", SERVER_PROTOCOL . "://" . SERVER_HOST . '/' );
    define ( "COMPONENTS_PATH" , SITE_ROOT . "components/" );
    define ( "CORE_PATH" , SITE_ROOT . "core/" );
    define ( "HELPERS_PATH" , SITE_ROOT . "helpers/" );
    define ( "MIDDLEWARES_PATH" , SITE_ROOT . "middlewares/" );
    define ( "MODELS_PATH" , SITE_ROOT . "models/" );
    define ( "STATIC_PATH" , SERVER_ROOT . "static/" );
    define ( "UPLOADS_PATH" , SITE_ROOT . "uploads/" );
    define ( "AUTH_PATH", SERVER_ROOT . "auth/" );
    define ( "CONFIGS_PATH", SITE_ROOT . "configs/" );
    define ( "API_PATH", SERVER_ROOT . 'api/' );

    define ( "ADMIN", "ADMIN" );
    define ( "USER", "USER" );
    define ( "GUEST", "GUEST" );

    define ( "DB_HOST", "localhost" );
    define ( "DB_PASSWORD" , "" );
    define ( "DB_USER", "root" );
    define ( "DB_DATABASE", "dashlite" );

    define ( "ENCRYPTION_KEY", "CKXH2U9RPY3EFD70TLS1ZG4N8WQBOVI6AMJ5" );
    define ( "DECRYPTION_KEY", "CKXH2U9RPY3EFD70TLS1ZG4N8WQBOVI6AMJ5" );

    define ( "RAZORPAY_KEY", "rzp_test_dGqqrFZM1pUqjh" );
   