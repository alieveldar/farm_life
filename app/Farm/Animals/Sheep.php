<?php

    namespace App\Farm\Animals;

    use App\Farm\Animals\Animal;

    class Sheep extends Animal
    {


        /**
         * @inheritDoc
         */
        public function collectProduct(): int
        {
            return rand()
        }
    }
