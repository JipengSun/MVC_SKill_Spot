<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc9318ef1ce40ef8bfe10d132f10ba593
{
    public static $files = array (
        '5255c38a0faeba867671b61dfda6d864' => __DIR__ . '/..' . '/paragonie/random_compat/lib/random.php',
        'c964ee0ededf28c96ebd9db5099ef910' => __DIR__ . '/..' . '/guzzlehttp/promises/src/functions_include.php',
        'a0edc8309cc5e1d60e3047b5df6b7052' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/functions_include.php',
        '3109cb1a231dcd04bee1f9f620d46975' => __DIR__ . '/..' . '/paragonie/sodium_compat/autoload.php',
        '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions_include.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
        ),
        'M' => 
        array (
            'Minishlink\\WebPush\\' => 19,
        ),
        'K' => 
        array (
            'Konekt\\PdfInvoice\\' => 18,
        ),
        'J' => 
        array (
            'Jose\\Component\\Signature\\' => 25,
            'Jose\\Component\\KeyManagement\\' => 29,
            'Jose\\Component\\Core\\' => 20,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
            'GuzzleHttp\\Promise\\' => 19,
            'GuzzleHttp\\' => 11,
        ),
        'F' => 
        array (
            'FG\\' => 3,
        ),
        'B' => 
        array (
            'Base64Url\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Minishlink\\WebPush\\' => 
        array (
            0 => __DIR__ . '/..' . '/minishlink/web-push/src',
        ),
        'Konekt\\PdfInvoice\\' => 
        array (
            0 => __DIR__ . '/..' . '/konekt/pdf-invoice/src',
        ),
        'Jose\\Component\\Signature\\' => 
        array (
            0 => __DIR__ . '/..' . '/web-token/jwt-signature',
        ),
        'Jose\\Component\\KeyManagement\\' => 
        array (
            0 => __DIR__ . '/..' . '/web-token/jwt-key-mgmt',
        ),
        'Jose\\Component\\Core\\' => 
        array (
            0 => __DIR__ . '/..' . '/web-token/jwt-core',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
        'GuzzleHttp\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/promises/src',
        ),
        'GuzzleHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src',
        ),
        'FG\\' => 
        array (
            0 => __DIR__ . '/..' . '/fgrosse/phpasn1/lib',
        ),
        'Base64Url\\' => 
        array (
            0 => __DIR__ . '/..' . '/spomky-labs/base64url/src',
        ),
    );

    public static $classMap = array (
        'FPDF' => __DIR__ . '/..' . '/setasign/fpdf/fpdf.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc9318ef1ce40ef8bfe10d132f10ba593::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc9318ef1ce40ef8bfe10d132f10ba593::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc9318ef1ce40ef8bfe10d132f10ba593::$classMap;

        }, null, ClassLoader::class);
    }
}
