<?php

namespace Lemming\Giphy;

use Discord\Parts\Channel\Message;
use Lemming\Command\Base;

class Command extends Base
{
    protected $api;

    /**
     * Command constructor.
     *
     * Add an global API reference.
     *
     * @param Message $message
     * @param $params
     */
    public function __construct(Message $message, $params)
    {
        $this->api = new Api();

        parent::__construct($message, $params);
    }

    /**
     * Search the library of gifs and attempt to find a great match.
     *
     * @return string
     */
    public function fire()
    {
        if (empty($this->params)) {
            $results = $this->api->random();
            $result = $results->data;

            $gif = $result->image_original_url;
        } else {
            $results = $this->api->match(implode(' ', $this->params), 1);
            $result = $results->data[0];

            $gif = $result->images->original->url;
        }

        return $this->message->channel->sendMessage($gif);
    }
}