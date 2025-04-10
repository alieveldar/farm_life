<?php

    namespace App\Farm\Products;

    /**
     *
     */
    abstract class Product
    {
        /**
         * @var ProductTypes
         */
        private ProductTypes $type;
        /**
         * @var string
         */
        private string $name = "product";

        /**
         * @param ProductTypes $type
         */
        public function __construct(ProductTypes $type)
        {
            $this->type = $type;
        }

        /**
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }

        /**
         * @return ProductTypes
         */
        public function getType(): ProductTypes
        {
            return $this->type;
        }
    }
