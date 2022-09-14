<?php
declare(strict_types=1);

class Database
{
    static function create_database(): void
    {
        $connection = mysqli_connect("localhost", "root", "");

        if ($connection) {
            mysqli_query($connection, "CREATE DATABASE isdigi_items;");
        }
    }

    static function create_tables(): void
    {
        $connection = mysqli_connect("localhost", "root", "", "isdigi_items");

        if ($connection) {
            mysqli_query($connection, "CREATE TABLE categories(
                id int,
                category varchar(255)
            )");

            mysqli_query($connection, "CREATE TABLE items(
                id int,
                name varchar(255),
                category_id int,
                price float                
            )");
        }
    }

    function fill_categories(): void {
        $categories = [
            [
                "id" => 1,
                "category"=>"Smartphones"
            ],
            [
                "id" => 2,
                "category"=>"Table PC's"
            ],
            [
                "id" => 3,
                "category"=>"Printers"
            ],
            [
                "id" => 4,
                "category"=>"Accessories"
            ],
            [
                "id" => 5,
                "category"=>"TV's"
            ],
            [
                "id" => 6,
                "category"=>"Laptops"
            ]
        ];

        $connection = mysqli_connect("localhost", "root", "", "isdigi_items");

        if ($connection) {
            foreach ($categories as $category){
                mysqli_query($connection, "INSERT INTO isdigi_items.categories (id, category)
                values ($category=>categories.id);");
            }

        }
    }
}