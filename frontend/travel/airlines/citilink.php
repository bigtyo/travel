<?php
$login = "https://book.citilink.co.id/LoginAgency.aspx";
$user = '0038000423';
$pass = 'LiNeLuCNCt!1';

$tanggalawal = $_GET['berangkat'];
$tanggalakhir = $_GET['kembali'];
$dari = $_GET['dari'];
$tujuan = $_GET['tujuan'];
$dewasa = $_GET['dewasa'];
$infant = $_GET['infant'];

use Goutte\Client;

$client = new Client();



$crawler = $client->request('GET', $login);
//$crawler = $client->click($crawler->selectLink('Sign in')->link());
$form = $crawler->selectButton('Log In')->form();
$crawler = $client->submit($form, array('ControlGroupLoginAgencyView$AgentLoginLoginAgencyView$TextBoxUserID' => $user, 
    'ControlGroupLoginAgencyView$AgentLoginLoginAgencyView$PasswordFieldPassword' => $pass));
$crawler->filter('#errorSectionContent > p')->each(function ($node) {
    print $node->text()."\n";
});
$form = $crawler->selectButton('Find Flights')->form();
echo $form->html();
?>
