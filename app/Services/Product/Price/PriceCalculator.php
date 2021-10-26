<?php


namespace App\Services\Product\Price;


class PriceCalculator
{
    /**
     * @var float
     */
    protected $price;

    /**
     * Tax in percents
     * @var int
     */
    protected $tax;

    public function __construct($price, $tax)
    {
        $this->price = $price;
        $this->tax = $tax;
    }

    /**
     * Get total price for poduct
     *
     * @param int $qty
     * @return float|int
     */
    public function getTotal($qty)
    {
        return ($this->price + ($this->price * $this->tax)/100) * $qty;
    }
}
