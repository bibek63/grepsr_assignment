<?php
require 'vendor/autoload.php';

use Goutte\Client;

$url = 'https://books.toscrape.com/';
$category_science = '';
$all_listing = [];
$client = new Client();
define("STAR_RATING", array(
'One'=>1.0,
'Two'=> 2.0,
'Three'=> 3.0,
'Four'=>4.0,
'Five'=>5.0,
)
);

$crawler = $client->request("GET", $url);

$crawler->filter('.side_categories a')->each(function ($node) {
    if($node->text()=="Science"){
        $GLOBALS['category_science'] = $node->attr('href');
    }
});

$science_crawler = $client->request("GET", $url . $category_science);

$science_crawler->filter('.product_pod')->each(function ($node) {
    $GLOBALS["all_listing"][] = $node->filter('h3 > a')->attr('title');
});

$heading = ['id', 'category', 'category_url', 'title', 'price', 'stock', 'rating', 'url'];

$csv_file = fopen('science_listing.csv', 'w');

fputcsv($csv_file, $heading);

$science_crawler->filter('.product_pod')->each(
    function ($node) {
        $id = substr(sha1(time()), 0, 8);
        $category = "Science";
        $category_url = $node->filter('h3 > a')->attr("href");
        $title = $node->filter('h3 > a')->attr('title');
        $price = floatval(explode("£",$node->filter('.price_color')->text())[1]);
        $stock = $node->filter('.instock')->text();
        $className = $node->filter('.star-rating')->attr('class');
        $rating = explode(' ', $className)[1];
        $stars_rating = STAR_RATING[$rating];
        $url = $GLOBALS['url'] . $GLOBALS['category_science'] . $category_url;
        $result_array = [$id, $category, $category_url, $title, $price, $stock, $stars_rating, $url];
        fputcsv($GLOBALS['csv_file'], $result_array);

    }
);

fclose($csv_file);

?>