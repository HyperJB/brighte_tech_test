<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\ComputerParts;


use AppBundle\DataFixtures\ORM\LoadBasicParkData;
use AppBundle\DataFixtures\ORM\LoadSecurityData;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserTestFunctionalTest extends WebTestCase
{

    public function testShowProductDetail() {
        $client = static::createClient();
        $client->request('GET', '/product-details/27');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testAddProduct() {
        
        $client = static::createClient();

        $crawler = $client->request('GET', '/product-create');
        $this->assertEquals('App\Controller\ComputerPartsController::newComponent', $client->getRequest()->attributes->get('_controller'));

        $form = $crawler->selectButton('Create')->form();

        $form['form[productName]']          = 'Test Product Name';
        $form['form[productPrice]']         = '5';
        $form['form[productDescription]']   = 'Test Product Description';
        $form['form[productPicture]']       = 'TestPic.jpg';

        $client->submit($form);

        $this->assertEquals('App\Controller\ComputerPartsController::newComponent', $client->getRequest()->attributes->get('_controller'));


    }

    public function testEditProduct() {
        
        $client = static::createClient();

        $crawler = $client->request('GET', '/product-edit/18');
        $this->assertEquals('App\Controller\ComputerPartsController::editComponent', $client->getRequest()->attributes->get('_controller'));
    
        $form = $crawler->selectButton('form_save')->form();

        $form['form[productName]']          = 'Test Product Name';
        $form['form[productPrice]']         = '5';
        $form['form[productDescription]']   = 'Test Product Description';
        $form['form[productPicture]']       = 'TestPic.jpg';
        

        $client->submit($form);
        $this->assertEquals('App\Controller\ComputerPartsController::editComponent', $client->getRequest()->attributes->get('_controller'));

    }

    public function testDeleteProduct() {
        $client = static::createClient();

        // Deletes Record id 27
        $crawler = $client->request('DELETE', '/delete/27');

        $this->assertEquals('App\Controller\ComputerPartsController::deleteRecord', $client->getRequest()->attributes->get('_controller'));
    }


}
