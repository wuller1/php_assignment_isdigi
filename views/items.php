<?php

declare(strict_types=1);
$data = Database::get_data();
$item_number = 0;

foreach ($data as $category => $items) :

    if ($item_number % 3 == 2 && $item_number !== 0) {
        echo ("
        <div class='card border-dark mb-3' style='max-width: 18rem;'>

            <div class='card-body text-dark'>
            </div>
        </div>");
        $item_number += 1;
    }

    echo ("
        <div class='card border-dark mb-3' style='max-width: 18rem;'>
            <div class='card-header'>{$category}</div>
            <div class='card-body text-dark'>
            </div>
        </div>");
    $item_number += 1;

    foreach ($items as $item) :
        echo ("
        <div class='card border-dark mb-3' style='max-width: 18rem;'>
            <div class='card-header'>{$item[0]} (Category: $category)</div>
            <div class='card-body text-dark'>
            Price: \${$item[1]}.00
            </div>
            
        </div>");
        $item_number += 1;
    endforeach;


endforeach;
