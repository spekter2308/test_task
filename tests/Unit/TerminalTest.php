<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\TerminalService;

class TerminalTest extends TestCase
{
    private $terminal;

    public function setUp(): void
    {
        if (!$this->terminal) {
            $this->terminal = new TerminalService();
        }
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_one()
    {
        $result = 16.94;
        $this->terminal->scan('A');
        $this->terminal->scan('B');
        $this->terminal->scan('E');
        $this->terminal->scan('C');
        $this->terminal->scan('D');
        $this->terminal->scan('E');

        $total = $this->terminal->getTotal();

        self::assertEquals($result, $total);
    }

    public function test_two()
    {
        $result = 32.34;
        $this->terminal->scan('A');
        $this->terminal->scan('A');
        $this->terminal->scan('A');
        $this->terminal->scan('B');
        $this->terminal->scan('C');
        $this->terminal->scan('D');
        $this->terminal->scan('A');
        $this->terminal->scan('A');
        $this->terminal->scan('B');
        $this->terminal->scan('E');

        $total = $this->terminal->getTotal();

        self::assertEquals($result, $total);
    }

    public function test_three()
    {
        $result = 7.975;
        $this->terminal->scan('C');
        $this->terminal->scan('C');
        $this->terminal->scan('C');
        $this->terminal->scan('C');
        $this->terminal->scan('C');
        $this->terminal->scan('C');
        $this->terminal->scan('C');

        $total = $this->terminal->getTotal();

        self::assertEquals($result, $total);
    }

    public function test_four()
    {
        $result = 14.74;
        $this->terminal->scan('A');
        $this->terminal->scan('B');
        $this->terminal->scan('C');
        $this->terminal->scan('D');

        $total = $this->terminal->getTotal();

        self::assertEquals($result, $total);
    }
}
