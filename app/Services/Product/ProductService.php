<?php


namespace App\Services\Product;

use App\Services\Product\PriceCalculator;
use Exception;
use App\Services\Product\Price\PriceCalculator as Price;
use App\Services\Product\Price\StockPriceCalculator;
use App\MockData\TestProducts;

class ProductService
{
    /**
     * @var string $code
     */
    public $code;

    /**
     * @var int $qty
     */
    public $qty;

    /**
     * @var string|null related product's code
     */
    public $related_code = null;

    /**
     * @var Price|StockPriceCalculator product price calculator
     */
    private $price;

    /**
     * ProductService constructor.
     * @param string $code Scanned product's code
     * @throws Exception
     */
    public function __construct($code)
    {
        $mockProdcuts = (new TestProducts())->getTestProducts();

        if (!in_array($code, array_keys($mockProdcuts))) {
            throw new Exception('Product with ' . $code . 'does not exists');
        }
        $product = $mockProdcuts[$code];
        $this->code = $product->code;
        $this->qty = 1;
        $this->price = $this->createPrice($product);
        $this->related_code = $product->related_code ?? null;
    }

    /**
     * Create PriceCalculator for product
     *
     * @param object $product
     * @return Price|StockPriceCalculator
     */
    public function createPrice($product)
    {
        if (property_exists($product, 'stockPrice') && property_exists($product, 'stockQty') && $product->stockPrice >= 0) {
            return new StockPriceCalculator($product->price, $product->tax, $product->stockPrice, $product->stockQty);
        }
        return new Price($product->price, $product->tax);
    }

    /**
     * Change qty for product
     *
     * @return $this product
     */
    public function add()
    {
        $this->qty++;
        return $this;
    }

    /**
     * Get price for current product
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price->getTotal($this->qty);
    }


    /**
     * Get price including related products
     *
     * @param int $qty
     * @return float
     */
    public function getRelatedCodePrice($qty)
    {
        return $this->price->getTotal($qty);
    }
}
