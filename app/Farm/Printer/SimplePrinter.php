<?php

    namespace App\Farm\Printer;

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
        public function printAnimalsStatistic(): void
        {
            $data = array();

            /** @var Animal $animal * */
            foreach ($this->farm->getAnimals() as $animal) {
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
        public function printProductsStatistic(): void
        {
            foreach ($this->farm->getCollectedProducts() as $product => $quantity) {
                print " $product: $quantity \n";
            }
        }
    }
