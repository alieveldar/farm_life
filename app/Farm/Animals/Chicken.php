<?php

    namespace App\Farm\Animals;

    use App\Farm\Products\ProductTypes;

    /**
     *
     */
    class Chicken extends Animal
    {
        /**
         *
         */
        public function __construct()
        {
            $this->AnimalType = AnimalTypes::CHICKEN;
            $this->productType = ProductTypes::EGGS;
            parent::__construct();
        }

        /**
         * @return int
         */
        #[\Override] public function collectProduct(): int
        {
            return rand(0, 1);
        }
    }
