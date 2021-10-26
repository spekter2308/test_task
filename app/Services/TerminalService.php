<?php

namespace App\Services;

use App\Services\Product\ProductService;

class TerminalService {
    private $products = [];

    /**
     * Scan a product
     *
     * @param string $code Scanned code
     * @return bool
     */
    public function scan($code) {
        if (! empty($this->products[$code])) {
            $this->products[$code]->add();
        } else {
            try {
                $product = new ProductService($code);
                if ($product) {
                    $this->products[$code] = $product;
                }
            } catch (\Exception $e) {
                //Error: product with code $code does not exists
                return false;
            }
        }
        return true;
    }

    /**
     * getTotal price with VAT for terminal
     *
     * @return float
     */
    public function getTotal()
    {
        $total = 0;
        foreach ($this->products as $product) {
            if ($product->related_code) {
                if (!empty($this->products[$product->related_code])) {
                    $freeProductQty = $product->qty - $this->products[$product->related_code]->qty <= 0 ? $product->qty : $this->products[$product->related_code]->qty;
                    $total += $product->getRelatedCodePrice($product->qty - $freeProductQty);
                    continue;
                }
            }

            $total += $product->getPrice();
        }

        return $total;
    }
}
