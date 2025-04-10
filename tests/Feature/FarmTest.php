<?php

    namespace Tests\Feature;

    use App\Farm\Animals\Chicken;
    use App\Farm\Animals\Cow;
    use App\Farm\Farm;
    use App\Farm\Printer\Printer;
    use Tests\TestCase;

    /**
     *
     */
    class FarmTest extends TestCase
    {
        /**
         * @var Farm
         */
        private Farm $farm;
        /**
         * @var Printer|(Printer&object&\PHPUnit\Framework\MockObject\MockObject)|(Printer&\PHPUnit\Framework\MockObject\MockObject)|(object&\PHPUnit\Framework\MockObject\MockObject)|\PHPUnit\Framework\MockObject\MockObject
         */
        private Printer $printer;

        /**
         * @return void
         * @throws \PHPUnit\Framework\MockObject\Exception
         */
        protected function setUp(): void
        {
            parent::setUp();
            $this->printer = $this->createMock(Printer::class);
            $this->farm = new Farm($this->printer);
        }

        /**
         * @return void
         */
        public function testCanAddAnimals()
        {
            $this->farm->addAnimal(new Cow());
            $this->farm->addAnimal(new Chicken());

            $this->assertCount(2, $this->getPrivateProperty($this->farm, 'animals'));
        }

        /**
         * @return void
         */
        public function testCollectProducts()
        {
            $this->farm->addAnimal(new Cow());
            $this->farm->addAnimal(new Chicken());

            $this->farm->collectProducts();

            $collectedProducts = $this->getPrivateProperty($this->farm, 'collectedProducts');

            $this->assertArrayHasKey('Milk', $collectedProducts);
            $this->assertArrayHasKey('Eggs', $collectedProducts);
        }

        /**
         * @param object $object
         * @param string $propertyName
         * @return mixed
         * @throws \ReflectionException
         */
        private function getPrivateProperty(object $object, string $propertyName)
        {
            $reflection = new \ReflectionClass($object);
            $property = $reflection->getProperty($propertyName);
            $property->setAccessible(true);
            return $property->getValue($object);
        }
    }
