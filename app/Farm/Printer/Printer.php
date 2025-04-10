<?php

    namespace App\Farm\Printer;

    use App\Farm\Farm;

    /**
     *
     */
    abstract class Printer
    {
        const ANIMAL_TYPE = 'animals';
        const PRODUCT_TYPE = 'products';

        /**
         * @var Farm
         */
        protected Farm $farm;

        public function __construct(Farm $farm)
        {
            $this->farm = $farm;
        }

        /**
         * @param array $animals
         * @return void
         */
        abstract function printAnimalsStatistic(): void;

        /**
         * @param array $products
         * @return void
         */
        abstract function printProductsStatistic(): void;
    }
