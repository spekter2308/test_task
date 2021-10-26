<?php


namespace App\Services\Product\Price;


class StockPriceCalculator extends PriceCalculator
{
    /**
     * @var float $stockPrice
     */
    private $stockPrice;

    /**
     * @var integer $stockQty
     */
    private $stockQty;

    public function __construct($price, $tax, $stockPrice, $stockQty)
    {
        parent::__construct($price, $tax);

        $this->stockPrice = $stockPrice;
        $this->stockQty = $stockQty;
    }

    /**
     * Get total for product with stock price and stock qty
     *
     * @param int $qty
     * @return float
     */
    public function getTotal($qty)
    {
        if ($qty < $this->stockQty) {
            return parent::getTotal($qty);
        }
        $stockGroups = intdiv($qty, $this->stockQty);
        $restQty = $qty - $stockGroups * $this->stockQty;

        return $stockGroups * ($this->stockPrice * (1 + $this->tax/100)) + parent::getTotal($restQty);
    }
}
