<?php

namespace Rubix\ML\Tests\Transformers;

use Rubix\ML\Datasets\Unlabeled;
use Rubix\ML\Transformers\Stateful;
use Rubix\ML\Transformers\Transformer;
use Rubix\ML\Datasets\Generators\Blob;
use Rubix\ML\Transformers\HotDeckImputer;
use Rubix\ML\Exceptions\RuntimeException;
use PHPUnit\Framework\TestCase;

/**
 * @group Transformers
 * @covers \Rubix\ML\Transformers\HotDeckImputer
 */
class HotDeckImputerTest extends TestCase
{
    protected const RANDOM_SEED = 0;

    /**
     * @var \Rubix\ML\Datasets\Unlabeled
     */
    protected $dataset;

    /**
     * @var \Rubix\ML\Datasets\Generators\Blob
     */
    protected $generator;

    /**
     * @var \Rubix\ML\Transformers\HotDeckImputer
     */
    protected $transformer;

    /**
     * @before
     */
    protected function setUp() : void
    {
        $this->dataset = new Unlabeled([
            [30, 0.001],
            [NAN, 0.055],
            [50, -2.0],
            [60, NAN],
            [10, 1.0],
            [100, 9.0],
        ]);

        $this->generator = new Blob([30.0, 0.0]);

        $this->transformer = new HotDeckImputer(2, true, '?');

        srand(self::RANDOM_SEED);
    }

    /**
     * @test
     */
    public function build() : void
    {
        $this->assertInstanceOf(HotDeckImputer::class, $this->transformer);
        $this->assertInstanceOf(Transformer::class, $this->transformer);
        $this->assertInstanceOf(Stateful::class, $this->transformer);
    }

    /**
     * @test
     */
    public function fitTransform() : void
    {
        $this->transformer->fit($this->dataset);

        $this->assertTrue($this->transformer->fitted());

        $this->dataset->apply($this->transformer);

        $this->assertEquals(30, $this->dataset[1][0]);
        $this->assertEquals(-2.0, $this->dataset[3][1]);
    }

    /**
     * @test
     */
    public function transformUnfitted() : void
    {
        $this->expectException(RuntimeException::class);

        $samples = $this->dataset->samples();

        $this->transformer->transform($samples);
    }
}
