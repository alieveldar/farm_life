<?php

    namespace App\Farm\Animals;

    use App\Farm\Products\ProductTypes;

    /**
     *
     */
    abstract class Animal
    {
        /**
         * @var string
         */
        protected string $id;
        /**
         * @var AnimalTypes
         */
        protected AnimalTypes $AnimalType;

        /**
         * @var ProductTypes
         */
        protected ProductTypes $productType;

        /**
         * @var string
         */
        protected string $product;

        /**
         *
         */
        public function __construct()
        {
            $this->id = uniqid();
        }

        /**
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }

        /**
         * @return AnimalTypes
         */
        public function getType(): AnimalTypes
        {
            return $this->AnimalType;
        }

        /**
         * @return ProductTypes
         */
        public function getProductType(): ProductTypes
        {
            return $this->productType;
        }

        /**
         * @return int
         */
        abstract public function collectProduct(): int;
    }
