<?php

declare(strict_types=1);

class Database
{

    static function get_data(): array
    {
        $data = [];
        $connection = mysqli_connect("localhost", "root", "", "isdigi_items");
        $categories = Database::get_categories();

        if ($connection) {
            foreach ($categories as $category) {
                $category_id = $category[0];
                $category_name = $category[1];
                $category_data = mysqli_fetch_all(mysqli_query($connection, "SELECT items.item_name, items.price 
                                                                    FROM items INNER JOIN categories 
                                                                    ON items.category_id = categories.id
                                                                    WHERE items.category_id = $category_id"));
                $data[$category_name] = $category_data;
            }
        }
        return $data;
    }

    static function get_categories(): array
    {
        $connection = mysqli_connect("localhost", "root", "", "isdigi_items");
        if ($connection) {
            $categories = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM categories"));
        }
        return $categories;
    }

    static function create_database(): void
    {
        $connection = mysqli_connect("localhost", "root", "");

        if ($connection) {
            mysqli_query($connection, "CREATE DATABASE isdigi_items;");
        }

        mysqli_close($connection);
    }

    static function drop_database(): void
    {
        $connection = mysqli_connect("localhost", "root", "", "isdigi_items");

        if ($connection) {
            mysqli_query($connection, "DROP DATABASE isdigi_items");
        }
    }

    static function create_tables(): void
    {
        $connection = mysqli_connect("localhost", "root", "", "isdigi_items");

        if ($connection) {
            mysqli_query($connection, "CREATE TABLE categories(
                id int unique,
                category varchar(255)
            )");

            mysqli_query($connection, "CREATE TABLE items(
                id int unique,
                item_name varchar(255),
                category_id int,
                price float                
            )");
        }

        mysqli_close($connection);
    }

    static function fill_categories(): void
    {
        $categories = [
            [
                "id" => 1,
                "category" => "Smartphones"
            ],
            [
                "id" => 2,
                "category" => "Tablets"
            ],
            [
                "id" => 3,
                "category" => "Printers"
            ],
            [
                "id" => 4,
                "category" => "Accessories"
            ],
            [
                "id" => 5,
                "category" => "TVs"
            ],
            [
                "id" => 6,
                "category" => "Laptops"
            ]
        ];

        $connection = mysqli_connect("localhost", "root", "", "isdigi_items");

        if ($connection) {
            foreach ($categories as $category) {
                $category_id = $category['id'];
                $category_category = $category['category'];
                mysqli_query($connection, "INSERT INTO isdigi_items.categories (id, category)
                values ('$category_id', '$category_category')");
            }
        }

        mysqli_close($connection);
    }

    static function fill_items(): void
    {
        $connection = mysqli_connect("localhost", "root", "", "isdigi_items");

        if ($connection) {
            $number = 1;
            for ($category_id = 0; $category_id < 7; $category_id++) {
                for ($i = 0; $i < rand(3, 7); $i++) {
                    $item_id = $number;
                    $item_category = $category_id;
                    $item_price = rand(100, 900);
                    $item_name = "Item $number";
                    $number += 1;

                    mysqli_query($connection, "INSERT INTO isdigi_items.items (id, category_id, price, item_name)
                    values ('$item_id', '$item_category', '$item_price', '$item_name')");
                }
                $number += 1;
            }
        }

        mysqli_close($connection);
    }
}
