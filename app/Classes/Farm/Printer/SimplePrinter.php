<?php

    namespace App\Classes\Farm\Printer;

    use App\Farm\Animals\Animal;

    /**
     *
     */
    class SimplePrinter extends Printer
    {

        /**
         * @param array $animals
         * @return void
         */
        public function printAnimalsStatistic(array $animals): void
        {
            $data = array();

            /** @var Animal $animal * */
            foreach ($animals as $animal) {
                $animalType = $animal->getType();
                if (isset($data[$animalType->value])) {
                    $data[$animalType->value] += 1;
                } else {
                    $data[$animalType->value] = 1;
                }
            }

            foreach ($data as $animal => $value) {
                print " $animal: $value \n";
            }
        }

        /**
         * @param array $products
         * @return void
         */
        public function printProductsStatistic(array $products): void
        {
            foreach ($products as $product => $quantity) {
                print " $product: $quantity \n";
            }
        }
    }
