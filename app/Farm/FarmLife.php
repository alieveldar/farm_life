<?php

    namespace App\Farm;

    use App\Farm\Animals\AnimalTypes;
    use App\Farm\Animals\Chicken;
    use App\Farm\Animals\Cow;
    use App\Farm\Printer\Printer;
    use App\Farm\Printer\SimplePrinter;

    class FarmLife
    {
        private Farm $farm;


        public function __construct()
        {
            $this->farm = new Farm();
        }

        /**
         * @param AnimalTypes $animalType
         * @param int $count
         * @return void
         */
        public function addAnimalsToFarm(AnimalTypes $animalType, int $count): void
        {

            for ($i = 1; $i <= $count; $i++) {
                $animal = match ($animalType) {
                    AnimalTypes::COW => new Cow(),
                    AnimalTypes::CHICKEN => new Chicken(),
                };
                $this->farm->addAnimal(new $animal);
            }
        }

        /**
         * @param int $cycles
         * @return void
         */
        public function runCyclesOfCollectProducts(int $days)
        {
            for ($i = 1; $i <= $days; $i++) {
                $this->farm->collectProducts();
            }
        }

        public function getFarm(): Farm
        {
            return $this->farm;
        }

    }
