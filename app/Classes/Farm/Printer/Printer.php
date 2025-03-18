<?php

    namespace App\Classes\Farm\Printer;

    /**
     *
     */
    abstract class Printer
    {
        const ANIMAL_TYPE = 'animals';
        const PRODUCT_TYPE = 'products';
        /**
         * @param array $animals
         * @return void
         */
        abstract function printAnimalsStatistic(array $animals): void;

        /**
         * @param array $products
         * @return void
         */
        abstract function printProductsStatistic(array $products): void;
    }
