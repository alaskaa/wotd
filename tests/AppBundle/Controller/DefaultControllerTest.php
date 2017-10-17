<?php

namespace Tests\AppBundle\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;

/**
 * Class DefaultControllerTest
 *
 * @package Tests\AppBundle\Controller
 */
class DefaultControllerTest extends WebTestCase
{
    /**
     * Test that the index page works when the database is empty
     */
    public function testIndexPage()
    {
        // Clear the database by loading no fixtures.
        $this->loadFixtures([]);

        $client = $this->makeClient();
        $crawler = $client->request('GET', '/');

        $this->isSuccessful($client->getResponse());

        $this->assertCount(1, $crawler->filter('h1'));

        $this->assertContains('Missing', $crawler->filter('h1')->text());
    }

    /**
     * Test that the index page works when a new word is elected
     */
    public function testNonDefaultWordIsElected()
    {
        $this->loadFixtures(['Tests\DataFixtures\NonDefaultWordFixture']);

        $client = $this->makeClient();

        $crawler = $client->request('GET', '/');

        $this->isSuccessful($client->getResponse());

        $this->assertContains('Example', $crawler->filter('h1')->text());
    }

    /**
     * Test that the index page works when a specific date is requested
     */
    public function testSpecificDateReturnsExpectedWord()
    {
        $this->loadFixtures(['Tests\DataFixtures\SpecificDateFixture']);

        $client = $this->makeClient();

        $crawler = $client->request('GET', '/', ['date' => '2017-10-15']);

        $this->isSuccessful($client->getResponse());

        $this->assertContains('Conviction', $crawler->filter('h1')->text());
    }

    /**
     * Test that the index page returns 404 when date not found.
     */
    public function testSpecificDateNotFound()
    {
        // For this test, we don't need any fixtures
        $this->loadFixtures([]);

        $client = $this->makeClient();

        // This test will fail on 2017-01-01...
        $crawler = $client->request('GET', '/', ['date' => '2017-01-01']);

        $this->assertStatusCode(404, $client);
    }

    /**
     * Test that the about page works
     */
    public function testAboutPage()
    {
        $client = $this->makeClient();
        $crawler = $client->request('GET', '/about');

        $this->isSuccessful($client->getResponse());

        $this->assertCount(1, $crawler->filter('h2.panel-title'));
    }
}
