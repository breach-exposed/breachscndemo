<?php
// ---------------------------------------------------
// Demo: PHP with Hardcoded AWS Keys + Random Utilities
// ---------------------------------------------------

require 'vendor/autoload.php'; // AWS SDK for PHP must be installed via Composer

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

// 1. Hardcoded AWS credentials (DO NOT use in real apps!)
define('AWS_KEY',    '');
define('AWS_SECRET', '');
define('AWS_REGION', '');

// 2. Create an S3 client
$s3Client = new S3Client([
    'version'     => 'latest',
    'region'      => AWS_REGION,
    'credentials' => [
        'key'    => AWS_KEY,
        'secret' => AWS_SECRET,
    ],
]);

// 3. Try to list S3 buckets
try {
    $result = $s3Client->listBuckets();
    $buckets = $result['Buckets'];
} catch (AwsException $e) {
    $buckets = [];
    $errorMsg = $e->getMessage();
}

// 4. Random quote
$quotes = [
    "Success is not final; failure is not fatal: It is the courage to continue that counts. – Winston Churchill",
    "The purpose of our lives is to be happy. – Dalai Lama",
    "Get busy living or get busy dying. – Stephen King",
    "You only live once, but if you do it right, once is enough. – Mae West"
];
$randomQuote = $quotes[array_rand($quotes)];

// 5. Random HEX color
function randomHexColor() {
    return sprintf('#%06X', random_int(0, 0xFFFFFF));
}

// Output HTML
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP + AWS Demo (Hardcoded Keys)</title>
    <style>
        body { font-family: sans-serif; padding: 2rem; background: <?= randomHexColor() ?>; color: #222; }
        .box { background: #fff; padding: 1rem 1.5rem; margin-bottom: 1.5rem; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }
        h1 { margin-top: 0; }
        code { background: #f4f4f4; padding: 0.2rem 0.4rem; border-radius: 4px; }
        ul { margin: 0.5rem 0 0 1.2rem; }
    </style>
</head>
<body>
    <div class="box">
        <h1>🎲 Random Quote</h1>
        <p><?= htmlspecialchars($randomQuote, ENT_QUOTES) ?></p>
    </div>

    <div class="box">
        <h1>☁️ Your S3 Buckets</h1>
        <?php if (!empty($buckets)): ?>
            <ul>
                <?php foreach ($buckets as $b): ?>
                    <li><?= htmlspecialchars($b['Name'], ENT_QUOTES) ?> (Created: <?= htmlspecialchars($b['CreationDate'], ENT_QUOTES) ?>)</li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No buckets found or error: <code><?= isset($errorMsg) ? htmlspecialchars($errorMsg, ENT_QUOTES) : 'Unknown error' ?></code></p>
        <?php endif; ?>
    </div>

    <div class="box">
        <h1>🎨 Random Background Color</h1>
        <p>This page’s background color is <?= randomHexColor() ?>.</p>
    </div>
</body>
</html>
