<?php

    namespace App\Farm\Animals;

    use App\Farm\Products\ProductTypes;

    /**
     *
     */
    class Cow extends Animal
    {

        /**
         *
         */
        public function __construct()
        {
            $this->AnimalType = AnimalTypes::COW;
            $this->productType = ProductTypes::MILK;
            parent::__construct();
        }

        /**
         * @return int
         */
        #[\Override] public function collectProduct(): int
        {
            return rand(8, 12);
        }
    }
