<?php

    namespace App\Farm;

    use App\Farm\Animals\Animal;

    /**
     *
     */
    class Farm
    {
        /**
         * @var array
         */
        private array $animals = [];
        /**
         * @var array
         */
        private array $collectedProducts = [];

        /**
         * @param Animal $animal
         * @return void
         */
        public function addAnimal(Animal $animal): void
        {
            $this->animals[] = $animal;
        }

        /**
         * @return void
         */
        public function collectProducts(int $days = 1): void
        {
            /** @var Animal $animal */
            foreach ($this->animals as $animal) {
                $productType = $animal->getProductType();
                if (isset($this->collectedProducts[$productType->value])) {
                    $this->collectedProducts[$productType->value] += $animal->collectProduct();
                } else {
                    $this->collectedProducts[$productType->value] = $animal->collectProduct();
                }
            }
        }

        /**
         * @return array
         */
        public function getAnimals(): array
        {
            return $this->animals;
        }

        /**
         * @return array
         */
        public function getCollectedProducts(): array
        {
            return $this->collectedProducts;
        }
    }
