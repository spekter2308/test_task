<?php


namespace App\MockData;


class TestProducts
{
    public function getTestProducts()
    {
        return [
            'A' => (object)[
                'code' => 'A',
                'price' => 2.00,
                'tax' => 10,
                'stockPrice' => 8.00,
                'stockQty' => 5
            ],
            'B' => (object)[
                'code' => 'B',
                'price' => 10.00,
                'tax' => 10,
            ],
            'C' => (object)[
                'code' => 'C',
                'price' => 1.25,
                'tax' => 10,
                'stockPrice' => 6.00,
                'stockQty' => 6
            ],
            'D' => (object)[
                'code' => 'D',
                'price' => 0.15,
                'tax' => 10,
                'stockPrice' => 6.00,
                'stockQty' => 6],
            'E' => (object)[
                'code' => 'E',
                'price' => 2.00,
                'tax' => 10,
                'related_code' => 'B'
            ],
        ];
    }
}
