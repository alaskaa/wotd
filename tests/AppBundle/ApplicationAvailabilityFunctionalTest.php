<?php

namespace Tests\AppBundle;

use Liip\FunctionalTestBundle\Test\WebTestCase;

/**
 * Class ApplicationAvailabilityFunctionTest
 *
 * @package Tests\AppBundle
 */
class ApplicationAvailabilityFunctionalTest extends WebTestCase
{
    /**
     * @param string $url
     *
     * @dataProvider urlProvider
     */
    public function testPageIsSuccessful($url)
    {
        $client = $this->makeClient();
        $crawler = $client->request('GET', $url);

        $this->isSuccessful($client->getResponse());

        // There is one <body> tag
        $this->assertSame(1, $crawler->filter('html > body')->count());
    }

    /**
     * @return array[]
     */
    public function urlProvider()
    {
        // Hardcode URLs in functional tests instead of using the URL generator.
        // Changing URLs could break the app for users.
        return [
            ['/'],
            ['/about'],
        ];
    }
}