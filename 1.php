<?php
// ---------------------------------------------
// Random PHP Utilities Demo
// ---------------------------------------------

// 1. Pick a random quote from a list
$quotes = [
    "The only way to do great work is to love what you do. – Steve Jobs",
    "Life is what happens when you’re busy making other plans. – John Lennon",
    "Nothing is impossible, the word itself says 'I’m possible'! – Audrey Hepburn",
    "In the end, we only regret the chances we didn’t take. – Lewis Carroll",
    "Stay hungry, stay foolish. – Steve Jobs"
];
$randomQuote = $quotes[array_rand($quotes)];

// 2. Generate a secure random password
function generateRandomPassword($length = 12) {
    // You can add/remove characters as needed:
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+';
    $password = '';
    $maxIndex = strlen($chars) - 1;
    for ($i = 0; $i < $length; $i++) {
        // random_int is cryptographically secure
        $password .= $chars[random_int(0, $maxIndex)];
    }
    return $password;
}

// 3. Generate a random HEX color code
function randomHexColor() {
    return sprintf('#%06X', random_int(0, 0xFFFFFF));
}

// 4. Shuffle an array of items
function shuffleArray(array $arr): array {
    shuffle($arr);
    return $arr;
}

// 5. Main output
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Random PHP Demo</title>
    <style>
        body { font-family: sans-serif; padding: 2rem; background: <?= randomHexColor() ?>; color: #333; }
        .box { background: #fff; padding: 1rem 1.5rem; margin-bottom: 1rem; border-radius: 8px; box-shadow: 0px 2px 6px rgba(0,0,0,0.1); }
        h1 { margin-top: 0; }
    </style>
</head>
<body>
    <div class="box">
        <h1>🎲 Random Quote</h1>
        <p><?= htmlspecialchars($randomQuote, ENT_QUOTES) ?></p>
    </div>

    <div class="box">
        <h1>🔐 Random Password</h1>
        <p><code><?= generateRandomPassword(16) ?></code></p>
    </div>

    <div class="box">
        <h1>🎨 Random Background Color</h1>
        <p>This page’s background was randomly set to <?= randomHexColor() ?>.</p>
    </div>

    <div class="box">
        <h1>🔀 Shuffled List</h1>
        <?php
            $items = ['Apple', 'Banana', 'Cherry', 'Date', 'Elderberry'];
            $shuffled = shuffleArray($items);
        ?>
        <ul>
            <?php foreach ($shuffled as $item): ?>
                <li><?= htmlspecialchars($item, ENT_QUOTES) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
