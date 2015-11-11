<?php
/**
 * Created by PhpStorm.
 * User: dpierwola
 * Date: 06.11.15
 * Time: 22:57
 */

namespace ClientProxyMarketApi\Tests\Proxy\Validators;
use \ClientProxyMarketApi\Proxy\Validators\IpValidator;

class IpValidatorTest extends \PHPUnit_Framework_TestCase {
    /**
     * @dataProvider ipDataProvider
     */
    public function testValidPass($value) {
        $this->assertTrue(true, (new IpValidator())->valid($value));
    }

    /**
     * @dataProvider invalidIpDataProvider
     * @expectedException \ClientProxyMarketApi\Proxy\Exceptions\InvalidIpException
     * @param $value
     */
    public function testValidTrowException($value) {
        (new IpValidator())->valid($value);
    }

    /**
     * @return array
     */
    public static function ipDataProvider() {
        return array(
            array('0.0.0.0'),
            array('255.255.255.255'),
            array('12.32.78.206'),
            array('192.168.1.1'),
            array('127.0.0.1')
        );
    }

    /**
     * @return array
     */
    public static function invalidIpDataProvider() {
        return array(
            array('-1.-1.-1.-1'),
            array('256.256.256.256'),
            array('as.dfs.sdf.df'),
            array('12.1.2'),
            array(' . . . '),
            array('34.34.2.')
        );
    }
}
