<?php
include 'include.php';
include_once("include_once.php");
require 'require.php';
require_once("require_once.php");
require $require;

define('DEFINE_INT', 4);
define('DEFINE_INT2', DEFINE_INT + 2);
define('DEFINE_BOOL', true);
define('DEFINE_FLOAT', M_PI * 2);
define("DEFINE_STRING", "Hello world");
define("DEFINE_STRING2", "$foo Hello world");

global $global_int = 1;
global $global_int2;
global $global_string = 'Hello world';
global $global_string2;
global $global_array[1] = "Hello";
global $HTTP_POST_VARS;

$GLOBALS['globals_string'] = 'foo';
$GLOBALS['globals_string2']; // same as above: global $global_string2;
$GLOBALS['globals_float'];
$GLOBALS['globals_object'] = new test;

function testParam(&$string = 'foo', $string2, $int = 123, $int2, $float = 123.45, $float2,
    $mixed = 'foo', $unknown = null)
{
    $string2 = 'foo';
    $int2 = 123;
    $float2 = 123.45;
    $mixed = 123;
}

class TestClass
{
    const const_int = 123;
    const const_float = DEFINE_FLOAT;
    const const_string = 'foo';

    var $int;
    private $number2;
    protected $number3;
    public static $number4;
    private static $int5 = 123;
    var $_int6;
    var $int7;
    var $int8;
    var $number9;
    var $int10;
    var $int11;
    static private $int12;
    static protected $int13;
    static public $int14;

    var $array;
    private $array2;
    protected $array3;
    public static $array4;
    private static $array5 = array();
    var $array6;

    var $string;
    private $string2;
    protected $string3;
    public static $string4;
    private static $string5 = '';
    var $string6;
    var $string7;
    var $string8;
    var $string9;
    var $string10;
    var $string11 = DEFINE_STRING2;
    var $string12;

    var $bool;
    var $bool2;
    var $bool3;

    var $mixed; // multiple types
    static $unknown; // public omitted, cannot guess type
    var $unknown2; // cannot guess type
    var $float;
    var $float2 = self::const_float;

    protected function testVar()
    {
        $this->int = 123;
        $this->number2 *= 123;
        $int = $this->number3 / 123;
        $int = 123 * self::$number4;
        $this->_int6 = (int)'foo';
        $this->int7++;
        --$this->int8;
        123 == $this->number9;
        $this->number9 === 123.456;
        DEFINE_INT2 >= $this->int10;
        $this->int11 >> self::const_int;

        $this->array = array();
        foreach($this->array2 as $if) {
        }
        $array = $this->array3[0];
        $array = $a . self::$array4[0];
        $this->array6 = (array)'foo';

        $this->string = 'foo';
        $this->string2 .= $a;
        $string = $a . $this->string3;
        $string = self::$string4 . $a;
        $this->string6 = "foo";
        __FUNCTION__ <= $this->string7;
        $this->string8 === (string)'foo';
        $this->string9 {
            0} ;
        PHP_SAPI != $this->string10;
        $this->string12 <= self::const_string;

        $this->bool = true;
        $this->bool2 = false;
        $this->bool3 = (bool)'foo';

        $this->mixed = 'foo';
        $this->mixed = 123;

        $this->float = M_PI;

        $global_int2 = 123;
        $global_string2 .= 'foo';

        $GLOBALS['globals_string2'] = 'foo';
        $GLOBALS['globals_float'] = 123.45;

        throw new Exception($error);
        throw new Exception2($error);
        return 'foo';
    }

    public function testReturnBool()
    {
        $this->bool = true;
        return $this->bool;
    }

    private function testReturnInt($int = 123)
    {
        return $int;
    }

    protected static function testReturnInt2()
    {
        return $int + $int2;
    }

    public static function testReturnString()
    {
        return self::$string5;
    }

    private static function testReturnString2()
    {
        return $stringa . $stringb;
    }

    function testReturnString3()
    {
        return $global_string2;
    }

    function _testReturnMixed()
    {
        return M_PI;
        return $stringa . $stringb;
    }

    static function testReturnGLOBALSString()
    {
        return $GLOBALS['globals_string2'];
    }
}

final class TestClassFinal
{
    final function finalFunction()
    {
    }

    function final functionFinal()
    {
        // note: final is normally supposed to prefix function
    }

    final public static function finalPublicStaticFuntion()
    {
    }

    static private function staticPrivateFuntion()
    {
        // note: static is normally supposed to follow public/private
    }
}

interface TestInterface
{
    public static function publicStaticFuntion($int = 0, $string = 'foo');

    public function publicFuntion();
}

abstract class TestAbstractClass
{
    abstract public static function publicStaticFuntion($int = 0, $string = 'foo');

    public function publicFuntion(){
	}
}

?>