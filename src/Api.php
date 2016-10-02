<?php

namespace Lemming\Giphy;

class Api
{
    const URL = 'http://api.giphy.com/v1/gifs';
    protected $key;

    /**
     * Api constructor.
     */
    public function __construct()
    {
        $this->key = env('GIPHY_API_KEY', $_SERVER['GIPHY_API_KEY']);
    }

    /**
     * Match the query phrase with any gif with the API.
     *
     * @param $query
     * @param int $limit
     * @param int $offset
     * @return null|string
     */
    public function match($query, $limit = 25, $offset = 0)
    {
        $endpoint = '/search';
        $params = [
            'q' => urlencode($query),
            'limit' => (int)$limit,
            'offset' => (int)$offset
        ];

        return $this->request($endpoint, $params);
    }

    /**
     * Pull a random gif, from the API.
     *
     * @return null|string
     */
    public function random()
    {
        $endpoint = '/random';

        return $this->request($endpoint);
    }

    /**
     * Make a request to the API, returning the outcome or nothing.
     *
     * @param $endpoint
     * @param array $params
     * @return string|null
     */
    private function request($endpoint, array $params = [])
    {
        $params['api_key'] = $this->key;
        $query = http_build_query($params);
        $url = self::URL . $endpoint . ($query ? '?' . $query : '');
        $result = file_get_contents($url);

        return $result ? json_decode($result) : null;
    }
}