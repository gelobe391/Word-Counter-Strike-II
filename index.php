<?php

// Pair: Jeffer Molato, Michael Angelo Demadura
//tokenize the input
function tokenizeText($text) {
    //token text into words
    $words = str_word_count(strtolower($text), 1);

    //common stop words
    $stopWords = array("the", "and", "in", "of", "a", "to", "is", "for", "on", "with", "that", "by", "this", "it", "as", "at", "from", "or", "an");
    $filteredWords = array_diff($words, $stopWords);

    return $filteredWords;
}

//calculate word frequencies
function Calculate_WordFrequency($words) {
    $wordFrequency = array_count_values($words);

    return $wordFrequency;
}

//sort word frequencies
function Sort_WordFrequency($wordFrequency, $sortOrder) {
    if ($sortOrder == "ascending") {
        asort($wordFrequency);
    } else {
        arsort($wordFrequency);
    }

    return $wordFrequency;
}

//display word frequencies
function Display_WordFrequency($wordFrequency, $limit) {
    $count = 0;
    echo "<table border='1'>";
    echo "<tr><th>Word</th><th>Frequency</th></tr>";
    foreach ($wordFrequency as $word => $frequency) {
        if ($count >= $limit) {
            break;
        }
        echo "<tr><td>$word</td><td>$frequency</td></tr>";
        $count++;
    }
    echo "</table>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST["text"];
    $sortOrder = $_POST["sortOrder"];
    $limit = $_POST["limit"];

    $words = tokenizeText($text);

    $word_frequency = Calculate_WordFrequency($words);

    $sortedWordFrequency = Sort_WordFrequency($word_frequency, $sortOrder);

    Display_WordFrequency($sortedWordFrequency, $limit);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Frequency Counter</title>
</head>
<body>
    <h2>Word Frequency Counter</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <textarea name="text" rows="10" cols="50"></textarea><br><br>
        Sort Order:
        <select name="sortOrder">
            <option value="ascending">Ascending</option>
            <option value="descending">Descending</option>
        </select><br><br>
        Limit:
        <input type="number" name="limit" value="10" min="1"><br><br>
        <input type="submit" value="Calculate">
    </form>
</body>
</html>
