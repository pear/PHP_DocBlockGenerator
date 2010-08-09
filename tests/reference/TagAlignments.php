<?php

/**
 * Short description for file
 *
 * Long description (if any) ...
 * line not to align
 *     + line not to align
 *     + line not to align
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy
 * the PHP License and are unable to obtain it through the web,
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category  CategoryName
 *            line to align after the tag
 * @package   TestClass
 *            line to align after the tag
 *            line to align after the tag
 * @author    Author's name <author@mail.com>
 *            line to align after the tag
 * @copyright 2007 Author's name
 * @license   http://www.php.net/license/3_01.txt The PHP License, version 3.01
 * @version   CVS: $Id: TagAlignments.php 30 2007-07-23 16:46:42Z mcorne $
 * @link      http://pear.php.net/package/TestClass
 * @see       References to other sections (if any)...
 */

/**
 * Description for include
 * line not to align
 */
include 'include.php';

/**
 * Description for define
 *line not to align (but would be nice to move one character to the right eventually)
 */
define('DEFINE_INT', 4);

/**
 * Description for global
 *       line not to align
 * @global integer text to align after the type
 *                 line to align after the type
 */
global $global_int = 1;

/**
 * Description for global
 * @global integer text to align after the type
 *                 line to align after the type
 *                 line to align after the type
 */
global $global_int2;

/**
 * Description for $GLOBALS
 * @global string $GLOBALS['globals_string']
 *                line to align after the type (which is acceptable at this point)
 *                line to align after the type (which is acceptable at this point)
 * @name   $globals_string text not to align (which is acceptable at this point)
 *         line to align after the tag (which is acceptable at this point)
 */
$GLOBALS['globals_string'] = 'foo';

/**
 * Short description for function
 *
 * Long description (if any) ...
 *
 * @param  string  &$string text to align after the variable
 *                          line to align after the variable
 *                          line to align after the variable
 * @param  string  $string2 text to align after the variable
 * @param  integer $int
 *                          line to align after the variable
 * @param  integer $int2    text to align after the variable
 * @param  float   $float   text to align after the variable
 * @param  float   $float2  text to align after the variable
 * @param  mixed   $mixed   text to align after the variable
 * @param  number  $null    text to align after the variable
 * @return void    text to align after the type
 *                 line to align after the type
 * @see    something to see
 *         line to align after the tag
 */
function testParam(&$string = 'foo', $string2, $int = 123, $int2, $float = 123.45, $float2,
    $mixed = 'foo', $null = null)
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
 * line not to align
 *     + line not to align
 *     + line not to align
 *
 * @category  CategoryName
 *            line to align after the tag
 * @package   TestClass
 *            line to align after the tag
 *            line to align after the tag
 * @author    Author's name <author@mail.com>
 *            line to align after the tag
 * @copyright 2007 Author's name
 * @license   http://www.php.net/license/3_01.txt The PHP License, version 3.01
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/TestClass
 * @see       References to other sections (if any)...
 */
class TestClass
{

    /**
     * Description for const
     * line not to align
     */
    const const_int = 123;

    /**
     * Description for const
     *           line not to align
     */
    const const_float = DEFINE_FLOAT;

    /**
     * Description for private
     *           line not to align
     * @var    array   text to align after the type
     *                 line to align after the type
     * @access private text to align after the value
     */
    private $array2;

    /**
     * Description for var
     * @var    integer
     *                 line to align after the type
     * @access public  text to align after the value
     *                 line to align after the value
     */
    var $int;


    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  string  &$string text to align after the variable
     *                          line to align after the variable
     *                          line to align after the variable
     * @param  string  $string2 text to align after the variable
     * @param  integer $int
     *                          line to align after the variable
     * @param  integer $int2    text to align after the variable
     * @param  float   $float   text to align after the variable
     * @param  float   $float2  text to align  after the variable
     * @param  mixed   $mixed   text to align  after the variable
     * @param  number  $null    text to align  after the variable
     * @return void    text to align after the type
     *                 line to align after the type
     * @see    something to see
     *         line to align after the tag
     */
    function testParam(&$string = 'foo', $string2, $int = 123, $int2, $float = 123.45, $float2,
        $mixed = 'foo', $null = null)
    {
        $string2 = 'foo';
        $int2 = 123;
        $float2 = 123.45;
        $mixed = 123;
    }

    /**
     * Short description for protected
     *
     * Long description (if any) ...
     *
     * @return string     text to align  after the type
     * @access protected  text to align  after the value
     *                    line to align  after the value
     * @throws Exception  text to align  after the value
     *                    line to align  after the value
     * @throws Exception2
     *                    line to align  after the value
     */
    protected function testVar()
    {
        throw new Exception($error);
        throw new Exception2($error);
        return 'foo';
    }

}

?>