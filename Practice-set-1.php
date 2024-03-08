<?php

//Pair: Jeffer Molato, Michael Angelo Demadura
function calculatePriceTotal(array $items): float
{
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'];
    }
    return $total;
}

function modifyString(string $string): string
{
    $string = str_replace(' ', '', $string);
    $string = strtolower($string);
    return $string;
}

function checkEvenNumber(int $number): string
{
    if ($number % 2 == 0) {
        return "The number $number is even.";
    } else {
        return "The number $number is odd.";
    }
}

$items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20],
];

$string = "This is a poorly written program with little structure and readability.";

// Calculate the total price of items
$total = calculatePriceTotal($items);
echo "Total price: $" . $total . "\n";

// Modify the string and display the result
$modifiedString = modifyString($string);
echo "Modified string: " . $modifiedString . "\n";

// Check if a number is even or odd and display the result
$number = 42;
echo checkEvenNumber($number) . "\n";
?>
