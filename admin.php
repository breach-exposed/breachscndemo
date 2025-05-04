<?php
// ---------------------------------------------
// Random PHP Utilities with Hardcoded Password
// ---------------------------------------------

// 1. Pick a random quote from a list
$quotes = [
    "Be yourself; everyone else is already taken. – Oscar Wilde",
    "Two things are infinite: the universe and human stupidity; and I'm not sure about the universe. – Albert Einstein",
    "So many books, so little time. – Frank Zappa",
    "In three words I can sum up everything I've learned about life: it goes on. – Robert Frost",
    "If you tell the truth, you don't have to remember anything. – Mark Twain"
];
$randomQuote = $quotes[array_rand($quotes)];



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
    <title>Random PHP Demo (Hardcoded Password)</title>
    <style>
        body { font-family: sans-serif; padding: 2rem; background: <?= randomHexColor() ?>; color: #333; }
        .box { background: #fff; padding: 1rem 1.5rem; margin-bottom: 1rem; border-radius: 8px; box-shadow: 0px 2px 6px rgba(0,0,0,0.1); }
        h1 { margin-top: 0; }
        code { background: #f4f4f4; padding: 0.2rem 0.4rem; border-radius: 4px;
