<?php

namespace Mateusjatenee\Currency;

use GuzzleHttp\Client;

class Currency
{

    protected $value;
    protected $from;
    protected $to;
    protected $convertion;

    protected $api = 'http://api.fixer.io/latest';

    /**
     * Initialize.
     *
     * @return void
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function from($from = 'USD')
    {
        $this->from = $from;
        return $this;
    }

    public function to(string $to)
    {
        $this->to = $to;
        $exchange = $this->exchange($this->value, $this->from, $this->to);

        $this->value = $this->value * $exchange;

        return $this;
    }

    public function get()
    {
        return $this->value;
    }

    protected function exchange($value, $from, $to)
    {
        $guzzle = new Client();

        $request = $guzzle->get($this->api, ['query' => ['base' => $from]]);

        $request = json_decode($request->getBody(), true);

        return $request['rates'][$to];
    }
}
