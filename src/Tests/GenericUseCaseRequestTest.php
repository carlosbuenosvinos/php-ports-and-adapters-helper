<?php

namespace HexArch\Tests;

use HexArch\GenericUseCaseRequest;

/**
 * Class GenericUseCaseRequestTest
 * @package HexArch\Tests
 * @author Carlos Buenosvinos (hi@©arlos.io)
 */
class GenericUseCaseRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function empty_response_should_not_have_specific_option()
    {
        $request = $this->buildResponse();
        $this->assertFalse($request->hasValue('NOT_DEFINED_PROPERTY'));
    }

    /**
     * @test
     */
    public function get_non_existing_value_should_return_null()
    {
        $request = $this->buildResponse();
        $this->assertNull($request->getValue('NOT_DEFINED_PROPERTY'));
    }

    /**
     * @test
     */
    public function get_non_existing_value_should_return_default_value()
    {
        $defaulValue = new \StdClass();

        $request = $this->buildResponse();
        $this->assertSame($defaulValue, $request->getValue('NOT_DEFINED_PROPERTY', $defaulValue));
    }

    /**
     * @test
     */
    public function set_not_existing_value()
    {
        $name = 'fooName';
        $value = 'fooValue';

        $request = $this->buildResponse();
        $this->assertFalse($request->hasValue($name));
        $this->assertEmpty($request->getValues());

        $request->setValue($name, $value);
        $this->assertTrue($request->hasValue($name));
        $this->assertNotEmpty($request->getValues());

        $this->assertSame($value, $request->getValue($name));
    }

    /**
     * @test
     */
    public function override_existing_value()
    {
        $name = 'fooName';
        $value = 'fooValue';
        $newValue = 'newFooValue';

        $request = $this->buildResponse();
        $request->setValue($name, $value);
        $this->assertSame($value, $request->getValue($name));

        $request->setValue($name, $newValue);
        $this->assertSame($newValue, $request->getValue($name));
    }

    /**
     * @param array $options
     * @return GenericUseCaseRequest
     */
    private function buildResponse($options = array())
    {
        return new GenericUseCaseRequest($options);
    }
}
