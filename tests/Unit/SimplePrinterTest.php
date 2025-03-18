<?php

    namespace Tests\Unit;

    use App\Classes\Farm\Printer\SimplePrinter;
    use App\Farm\Animals\Chicken;
    use App\Farm\Animals\Cow;
    use PHPUnit\Framework\TestCase;

    /**
     *
     */
    class SimplePrinterTest extends TestCase
    {
        /**
         * @var SimplePrinter
         */
        private SimplePrinter $printer;

        /**
         * @return void
         */
        protected function setUp(): void
        {
            parent::setUp();
            $this->printer = new SimplePrinter();
        }

        /**
         * @return void
         */
        public function testPrintAnimalsStatistic()
        {
            $animals = [
                new Cow(),
                new Cow(),
                new Chicken(),
                new Chicken(),
                new Chicken(),
            ];

            ob_start();
            $this->printer->printAnimalsStatistic($animals);
            $output = ob_get_clean();

            $this->assertStringContainsString("Cow: 2", $output);
            $this->assertStringContainsString("Chicken: 3", $output);
        }

        /**
         * @return void
         */
        public function testPrintProductsStatistic()
        {
            $products = [
                'Milk' => 15,
                'Eggs' => 7,
            ];

            ob_start();
            $this->printer->printProductsStatistic($products);
            $output = ob_get_clean();

            $this->assertStringContainsString("Milk: 15", $output);
            $this->assertStringContainsString("Eggs: 7", $output);
        }
    }
