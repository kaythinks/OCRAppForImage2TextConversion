<?php

namespace Tests\UnitTesting;

use PHPUnit\Framework\TestCase;
use thiagoalessio\TesseractOCR\TesseractOCR;

class ExampleTest extends TestCase
{
    public function testGetBaeRoute()
    {
    	$data = ( new TesseractOCR('public/SUCCESS.jpg') )->run();

    	$this->assertEquals('SUCCESS',$data);
    }
}