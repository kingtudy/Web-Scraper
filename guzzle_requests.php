<?php
# scraping vinils from: https://carturesti.ro
require 'vendor/autoload.php';
$httpClient = new \GuzzleHttp\Client(['verify' => './cert/cacert.pem']);
$response = $httpClient->get('https://www.imobiliare.ro/ansambluri-rezidentiale/bucuresti?mod=list&_gl=1*kol7kr*_up*MQ..*_ga*MTA0MjY3MjE1Mi4xNzA3MzQ5MDE1*_ga_0GSJES104K*MTcwNzM0OTAxNS4xLjEuMTcwNzM0OTAzMC4wLjAuMA..');
$htmlString = (string) $response->getBody();

//print_r($htmlString);

libxml_use_internal_errors(true); //suppress any warnings
$doc = new DOMDocument();
$doc->loadHTML($htmlString);
$xpath = new DOMXPath($doc);


//$titles = $xpath->evaluate('//prod-grid-box//div[@class="grid-product-details"]//a//h5[@class="md-title ng-binding"]/text()');
$titles = $xpath->evaluate('//div[@class="titlu-proiect"]//h2/text()');
//print_r($titles);

$arrayImobiliareName = [];
foreach ($titles as $title) {
    $arrayImobiliareName[] = $title->nodeValue . PHP_EOL;
}

print_r($arrayImobiliareName);