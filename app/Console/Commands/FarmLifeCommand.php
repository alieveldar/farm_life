<?php

    namespace App\Console\Commands;

    use App\Farm\Animals\AnimalTypes;
    use App\Farm\Animals\Chicken;
    use App\Farm\Animals\Cow;
    use App\Farm\Farm;
    use App\Farm\FarmLife;
    use App\Farm\Printer\Printer;
    use App\Farm\Printer\SimplePrinter;
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
         * Execute the console command.
         */
        public function handle(SimplePrinter $printer)
        {
            $cows = 10;
            $chickens = 20;
            $days = 7;

            $farmLifeHandler = new FarmLife();
            $farmLifeHandler->addAnimalsToFarm(AnimalTypes::CHICKEN, $chickens);
            $farmLifeHandler->addAnimalsToFarm(AnimalTypes::COW, $cows);
            $printer->printAnimalsStatistic();
            $farmLifeHandler->runCyclesOfCollectProducts($days);
            print "After $days days \n";
            $printer->printProductsStatistic();

            print " New animals come to farm  \n";

            $cows = 1;
            $chickens = 5;

            $farmLifeHandler->addAnimalsToFarm(AnimalTypes::CHICKEN, $chickens);
            $farmLifeHandler->addAnimalsToFarm(AnimalTypes::COW, $cows);
            $printer->printAnimalsStatistic();
            $farmLifeHandler->runCyclesOfCollectProducts($days);
            print "After $days days \n";
            $printer->printProductsStatistic();
        }
    }
