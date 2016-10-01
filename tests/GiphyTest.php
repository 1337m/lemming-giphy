<?php

use PHPUnit\Framework\TestCase;

class GiphyTest extends TestCase
{
    protected $api;

    /**
     * Setup the API.
     */
    public function setUp()
    {
        $this->api = new \Lemming\Giphy\Api();
    }

    /**
     * Test the random gif query.
     */
    public function testRandomGif()
    {
        $gif = $this->api->random();

        $this->assertNotNull($gif);
        $this->assertNotEquals($gif, $this->api->random());
    }

    /**
     * Test the random gif query.
     */
    public function testMatchingGif()
    {
        $gif = $this->api->match('fire');

        $this->assertNotNull($gif);
    }
}
