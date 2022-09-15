<?php

declare(strict_types=1);

require("./classes/Database.php");

// Database::drop_database();
Database::create_database();
Database::create_tables();
Database::fill_categories();
Database::fill_items();
