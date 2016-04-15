<?php

namespace Mateusjatenee\Currency;

use GuzzleHttp\Client;

class Currency
{
    /**
     * @var int
     */
    protected $value;
    /**
     * @var string
     */
    protected $from;
    /**
     * @var string
     */
    protected $to;
    /**
     * @var string
     */
    protected $api = 'http://api.fixer.io/latest';

    /**
     * @param int $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Returns all exchange rates.
     *
     * @param string $from
     *
     * @return array
     */
    public function all(string $from)
    {
        $guzzle = new Client();

        $request = $guzzle->get($this->api, ['query' => ['base' => $from]]);

        $request = json_decode($request->getBody(), true);

        return $request['rates'];
    }

    /**
     * @param string $from
     *
     * @return $this
     */
    public function from($from = 'USD')
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @param string $to
     *
     * @return $this
     */
    public function to(string $to)
    {
        $this->to = $to;
        $exchange = $this->exchange($this->value, $this->from, $this->to);

        $this->value = $this->value * $exchange;

        return $this;
    }

    /**
     * @return float
     */
    public function get()
    {
        return $this->value;
    }

    /**
     * @param $value
     * @param $from
     * @param $to
     *
     * @return mixed
     */
    protected function exchange($value, $from, $to)
    {
        $guzzle = new Client();

        $request = $guzzle->get($this->api, ['query' => ['base' => $from]]);

        $request = json_decode($request->getBody(), true);

        $this->from = $to;

        return $request['rates'][$to];
    }
}
