<?php

require 'vendor/autoload.php';

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['verify' => false]);
$resposta = $client->request('GET', 'https://www.alura.com.br/cursos-online-programacao/python');

$html = $resposta->getBody();

$crawler = new Crawler();
$crawler->addHtmlContent($html);

$cursos = $crawler->filter('span.card-curso__nome');

foreach ($cursos as $curso) {
    echo $curso->textContent . PHP_EOL;
}