<?php

    namespace App\Console\Commands;

    use App\Classes\Farm\Animals\AnimalTypes;
    use App\Classes\Farm\Printer\SimplePrinter;
    use App\Farm\Animals\Chicken;
    use App\Farm\Animals\Cow;
    use App\Farm\Farm;
    use Illuminate\Console\Command;

    /**
     *
     */
    class FarmLifeCommand extends Command
    {
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'farm:life';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Farm life program';

        /**
         * @var Farm
         */
        private Farm $farm;


        /**
         * Execute the console command.
         */
        public function handle()
        {
            $cows = 10;
            $chickens = 20;
            $cycles = 7;

            $this->farm = new Farm(new SimplePrinter());
            $this->addAnimalsToFarm(AnimalTypes::CHICKEN, $chickens);
            $this->addAnimalsToFarm(AnimalTypes::COW, $cows);
            $this->farm->printStatistic('animals');
            $this->runCyclesOfCollectProducts($cycles);
            print "After $cycles days \n";
            $this->farm->printStatistic('products');

            print " New animals come to farm  \n";

            $cows = 1;
            $chickens = 5;
            $this->addAnimalsToFarm(AnimalTypes::CHICKEN, $chickens);
            $this->addAnimalsToFarm(AnimalTypes::COW, $cows);
            $this->farm->printStatistic('animals');
            $this->runCyclesOfCollectProducts($cycles);
            print "After $cycles days \n";
            $this->farm->printStatistic('products');
        }

        /**
         * @param AnimalTypes $animalType
         * @param int $count
         * @return void
         */
        private function addAnimalsToFarm(AnimalTypes $animalType, int $count): void
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
        private function runCyclesOfCollectProducts(int $cycles)
        {
            for ($i = 1; $i <= $cycles; $i++) {
                $this->farm->collectProducts();
            }
        }
    }
