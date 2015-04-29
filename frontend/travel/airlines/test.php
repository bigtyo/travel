<?php
$crawler = $client->request('GET', 'http://github.com/');
$crawler = $client->click($crawler->selectLink('Sign in')->link());
$form = $crawler->selectButton('Sign in')->form();
$crawler = $client->submit($form, array('login' => 'fabpot', 'password' => 'xxxxxx'));
$crawler->filter('.flash-error')->each(function ($node) {
    print $node->text()."\n";
});
?>