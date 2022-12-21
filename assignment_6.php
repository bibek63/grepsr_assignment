<?php
// Write a code to create a ‘CSV’ file named ‘laptop.csv’ with column names as listed:
// a. Title
// b. Price
// c. Brand
// from JSON data. (available at https://dummyjson.com/products/search?q=Laptop)

$url = 'http://dummyjson.com/products/search?q=Laptop';
$json = file_get_contents($url);
$data = json_decode($json, true);



$fp = fopen('laptop.csv', 'w');
fputcsv($fp, array('Title', 'Price', 'Brand'));

foreach ($data["products"] as $row) {
  fputcsv($fp, array($row['title'], $row['price'], $row['brand']));
}

fclose($fp);


?>