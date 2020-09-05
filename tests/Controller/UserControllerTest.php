<?php


namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testCreateUser()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/new');
        $form = $crawler->selectButton('Save')->form();

        $form['user[name]'] = 'testName';
        $form['user[surname]'] = 'testSurname';
        $form['user[phone_number]'] = '123456789';
        $form['user[address][street]'] = 'testStreet';
        $form['user[address][country]'] = 'testCountry';
        $form['user[address][city]'] = 'testCity';
        $form['user[address][postCode]'] = '44-117';

        $crawler = $client->submit($form);

        $this->assertNotEquals(0, $crawler->filter('.edit-button'), 'There should be an edit button for newly added object');
    }

    public function testCreateUserIncorrectPhoneNumber()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/new');
        $form = $crawler->selectButton('Save')->form();

        $form['user[name]'] = 'testName';
        $form['user[surname]'] = 'testSurname';
        $form['user[phone_number]'] = '1234589';
        $form['user[address][street]'] = 'testStreet';
        $form['user[address][country]'] = 'testCountry';
        $form['user[address][city]'] = 'testCity';
        $form['user[address][postCode]'] = '44-117';

        $crawler = $client->submit($form);

        $this->assertNotEquals(0, $crawler->filter('li:contains("You must enter valid phone number")'), 'Error message should be displayed');
    }
}