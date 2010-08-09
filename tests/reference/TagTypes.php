<?php

/**
 * Short description for file
 *
 * Long description (if any) ...
 *
 * PHP version 5
 *
 * All rights reserved.
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 * + Redistributions of source code must retain the above copyright notice,
 * this list of conditions and the following disclaimer.
 * + Redistributions in binary form must reproduce the above copyright notice,
 * this list of conditions and the following disclaimer in the documentation and/or
 * other materials provided with the distribution.
 * + Neither the name of the <ORGANIZATION> nor the names of its contributors
 * may be used to endorse or promote products derived
 * from this software without specific prior written permission.
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR
 * CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 * EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
 * PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
 * PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
 * LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 * NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @category  CategoryName
 * @package   TestClass
 * @author    Author's name <author@mail.com>
 * @copyright 2007 Author's name
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   CVS: $Id: TagTypes.php 31 2007-09-13 10:21:01Z mcorne $
 * @link      http://pear.php.net/package/TestClass
 * @see       References to other sections (if any)...
 */

/**
 * Description for include
 */
include 'include.php';

/**
 * Description for include_once
 */
include_once("include_once.php");

/**
 * Description for require
 */
require 'require.php';

/**
 * Description for require_once
 */
require_once("require_once.php");

/**
 * Description for require
 */
require $require;

/**
 * Description for define
 */
define('DEFINE_INT', 4);

/**
 * Description for define
 */
define('DEFINE_INT2', DEFINE_INT + 2);

/**
 * Description for define
 */
define('DEFINE_BOOL', true);

/**
 * Description for define
 */
define('DEFINE_FLOAT', M_PI * 2);

/**
 * Description for define
 */
define("DEFINE_STRING", "Hello world");

/**
 * Description for define
 */
define("DEFINE_STRING2", "$foo Hello world");

/**
 * Description for global
 * @global integer
 */
global $global_int = 1;

/**
 * Description for global
 * @global integer
 */
global $global_int2;

/**
 * Description for global
 * @global string
 */
global $global_string = 'Hello world';

/**
 * Description for global
 * @global string
 */
global $global_string2;

/**
 * Description for global
 * @global array
 */
global $global_array[1] = "Hello";

/**
 * Description for global
 * @global unknown
 */
global $HTTP_POST_VARS;

/**
 * Description for $GLOBALS
 * @global string $GLOBALS['globals_string']
 * @name   $globals_string
 */
$GLOBALS['globals_string'] = 'foo';

/**
 * Description for $GLOBALS
 * @global string $GLOBALS['globals_string2']
 * @name   $globals_string2
 */
$GLOBALS['globals_string2']; // same as above: global $global_string2;

/**
 * Description for $GLOBALS
 * @global float $GLOBALS['globals_float']
 * @name   $globals_float
 */
$GLOBALS['globals_float'];

/**
 * Description for $GLOBALS
 * @global object $GLOBALS['globals_object']
 * @name   $globals_object
 */
$GLOBALS['globals_object'] = new test;

/**
 * Short description for function
 *
 * Long description (if any) ...
 *
 * @param  string  &$string Parameter description (if any) ...
 * @param  string  $string2 Parameter description (if any) ...
 * @param  integer $int     Parameter description (if any) ...
 * @param  integer $int2    Parameter description (if any) ...
 * @param  float   $float   Parameter description (if any) ...
 * @param  float   $float2  Parameter description (if any) ...
 * @param  mixed   $mixed   Parameter description (if any) ...
 * @param  unknown $unknown Parameter description (if any) ...
 * @return void
 */
function testParam(&$string = 'foo', $string2, $int = 123, $int2, $float = 123.45, $float2,
    $mixed = 'foo', $unknown = null)
{
    $string2 = 'foo';
    $int2 = 123;
    $float2 = 123.45;
    $mixed = 123;
}

/**
 * Short description for class
 *
 * Long description (if any) ...
 *
 * @category  CategoryName
 * @package   TestClass
 * @author    Author's name <author@mail.com>
 * @copyright 2007 Author's name
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/TestClass
 * @see       References to other sections (if any)...
 */
class TestClass
{

    /**
     * Description for const
     */
    const const_int = 123;

    /**
     * Description for const
     */
    const const_float = DEFINE_FLOAT;

    /**
     * Description for const
     */
    const const_string = 'foo';

    /**
     * Description for var
     * @var    integer
     * @access public
     */
    var $int;

    /**
     * Description for private
     * @var    number
     * @access private
     */
    private $number2;

    /**
     * Description for protected
     * @var    number
     * @access protected
     */
    protected $number3;

    /**
     * Description for public
     * @var    number
     * @access public
     * @static
     */
    public static $number4;

    /**
     * Description for private
     * @var    integer
     * @access private
     * @static
     */
    private static $int5 = 123;

    /**
     * Description for var
     * @var    integer
     * @access private
     */
    var $_int6;

    /**
     * Description for var
     * @var    integer
     * @access public
     */
    var $int7;

    /**
     * Description for var
     * @var    integer
     * @access public
     */
    var $int8;

    /**
     * Description for var
     * @var    number
     * @access public
     */
    var $number9;

    /**
     * Description for var
     * @var    integer
     * @access public
     */
    var $int10;

    /**
     * Description for var
     * @var    integer
     * @access public
     */
    var $int11;

    /**
     * Description for static
     * @var    unknown
     * @access private
     * @static
     */
    static private $int12;

    /**
     * Description for static
     * @var    unknown
     * @access protected
     * @static
     */
    static protected $int13;

    /**
     * Description for static
     * @var    unknown
     * @access public
     * @static
     */
    static public $int14;

    /**
     * Description for var
     * @var    array
     * @access public
     */
    var $array;

    /**
     * Description for private
     * @var    array
     * @access private
     */
    private $array2;

    /**
     * Description for protected
     * @var    array
     * @access protected
     */
    protected $array3;

    /**
     * Description for public
     * @var    array
     * @access public
     * @static
     */
    public static $array4;

    /**
     * Description for private
     * @var    array
     * @access private
     * @static
     */
    private static $array5 = array();

    /**
     * Description for var
     * @var    array
     * @access public
     */
    var $array6;

    /**
     * Description for var
     * @var    string
     * @access public
     */
    var $string;

    /**
     * Description for private
     * @var    string
     * @access private
     */
    private $string2;

    /**
     * Description for protected
     * @var    string
     * @access protected
     */
    protected $string3;

    /**
     * Description for public
     * @var    string
     * @access public
     * @static
     */
    public static $string4;

    /**
     * Description for private
     * @var    string
     * @access private
     * @static
     */
    private static $string5 = '';

    /**
     * Description for var
     * @var    string
     * @access public
     */
    var $string6;

    /**
     * Description for var
     * @var    string
     * @access public
     */
    var $string7;

    /**
     * Description for var
     * @var    string
     * @access public
     */
    var $string8;

    /**
     * Description for var
     * @var    string
     * @access public
     */
    var $string9;

    /**
     * Description for var
     * @var    string
     * @access public
     */
    var $string10;

    /**
     * Description for var
     * @var    string
     * @access public
     */
    var $string11 = DEFINE_STRING2;

    /**
     * Description for var
     * @var    string
     * @access public
     */
    var $string12;

    /**
     * Description for var
     * @var    boolean
     * @access public
     */
    var $bool;

    /**
     * Description for var
     * @var    boolean
     * @access public
     */
    var $bool2;

    /**
     * Description for var
     * @var    boolean
     * @access public
     */
    var $bool3;

    /**
     * Description for var
     * @var    mixed
     * @access public
     */
    var $mixed; // multiple types


    /**
     * Description for static
     * @var    unknown
     * @access public
     * @static
     */
    static $unknown; // public omitted, cannot guess type


    /**
     * Description for var
     * @var    unknown
     * @access public
     */
    var $unknown2; // cannot guess type


    /**
     * Description for var
     * @var    float
     * @access public
     */
    var $float;

    /**
     * Description for var
     * @var    float
     * @access public
     */
    var $float2 = self::const_float;

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return string     Return description (if any) ...
     * @access protected
     * @throws Exception  Exception description (if any) ...
     * @throws Exception2 Exception description (if any) ...
     */
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

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return boolean Return description (if any) ...
     * @access public
     */
    public function testReturnBool()
    {
        $this->bool = true;
        return $this->bool;
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  integer $int Parameter description (if any) ...
     * @return integer Return description (if any) ...
     * @access private
     */
    private function testReturnInt($int = 123)
    {
        return $int;
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return integer   Return description (if any) ...
     * @access protected
     * @static
     */
    protected static function testReturnInt2()
    {
        return $int + $int2;
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return string Return description (if any) ...
     * @access public
     * @static
     */
    public static function testReturnString()
    {
        return self::$string5;
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return string  Return description (if any) ...
     * @access private
     * @static
     */
    private static function testReturnString2()
    {
        return $stringa . $stringb;
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return string Return description (if any) ...
     * @access public
     */
    function testReturnString3()
    {
        return $global_string2;
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return mixed   Return description (if any) ...
     * @access private
     */
    function _testReturnMixed()
    {
        return M_PI;
        return $stringa . $stringb;
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return string Return description (if any) ...
     * @access public
     * @static
     */
    static function testReturnGLOBALSString()
    {
        return $GLOBALS['globals_string2'];
    }
}

/**
 * Short description for class
 *
 * Long description (if any) ...
 *
 * @category  CategoryName
 * @package   TestClass
 * @author    Author's name <author@mail.com>
 * @copyright 2007 Author's name
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/TestClass
 * @see       References to other sections (if any)...
 */
final class TestClassFinal
{

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return void
     * @access public
     */
    final function finalFunction()
    {
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return void
     * @access public
     */
    function final functionFinal()
    {
        // note: final is normally supposed to prefix function
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return void
     * @access public
     * @static
     */
    final public static function finalPublicStaticFuntion()
    {
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return void
     * @access private
     * @static
     */
    static private function staticPrivateFuntion()
    {
        // note: static is normally supposed to follow public/private
    }
}

/**
 * Short description for interface
 *
 * Long description (if any) ...
 *
 * @category  CategoryName
 * @package   TestClass
 * @author    Author's name <author@mail.com>
 * @copyright 2007 Author's name
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/TestClass
 * @see       References to other sections (if any)...
 */
interface TestInterface
{

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  integer $int    Parameter description (if any) ...
     * @param  string  $string Parameter description (if any) ...
     * @access public
     * @static
     */
    public static function publicStaticFuntion($int = 0, $string = 'foo');

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @access public
     */
    public function publicFuntion();
}

/**
 * Short description for class
 *
 * Long description (if any) ...
 *
 * @category  CategoryName
 * @package   TestClass
 * @author    Author's name <author@mail.com>
 * @copyright 2007 Author's name
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/TestClass
 * @see       References to other sections (if any)...
 */
abstract class TestAbstractClass
{

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  integer $int    Parameter description (if any) ...
     * @param  string  $string Parameter description (if any) ...
     * @access public
     */
    abstract public static function publicStaticFuntion($int = 0, $string = 'foo');

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return void
     * @access public
     */
    public function publicFuntion(){
	}
}

?>