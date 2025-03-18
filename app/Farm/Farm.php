<?php

    namespace App\Farm;

    use App\Classes\Farm\Printer\Printer;
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
         * @var Printer
         */
        private Printer $printer;

        /**
         * @param Printer $printer
         */
        public function __construct(Printer $printer)
        {
            $this->printer = $printer;
        }

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
        public function collectProducts(): void
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
         * @param $type
         * @return void
         */
        public function printStatistic($type): void
        {
            switch ($type) {
                case Printer::ANIMAL_TYPE:
                    $this->printer->printAnimalsStatistic($this->animals);
                    break;
                case Printer::PRODUCT_TYPE:
                    $this->printer->printProductsStatistic($this->collectedProducts);
                    break;
            }
        }
    }
