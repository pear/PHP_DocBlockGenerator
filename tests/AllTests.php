<?php
/**
 * DocBlock Generator
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
 * + The names of its contributors may not be used to endorse or
 * promote products derived from this software without specific prior written permission.
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
 * @category  PHP
 * @package   PHP_DocBlockGenerator
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2007 Michel Corne
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   SVN: $Id: AllTests.php 30 2007-07-23 16:46:42Z mcorne $
 * @link      http://pear.php.net/package/PHP_DocBlockGenerator
 */
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'PHP_DocBlockGenerator_AllTests::main');
}

require_once 'PHPUnit/Framework.php';
require_once 'PHPUnit/TextUI/TestRunner.php';
// adds the path of the package if this is a raw install
file_exists("../../PHP/") and set_include_path('../..' . PATH_SEPARATOR . get_include_path());
require_once 'DocBlockGeneratorTest.php';

/**
 * DocBlock Generator Test suite
 *
 * Run the tests from the tests directory.
 * #phpunit  PHP_DocBlockGenerator_AllTests AllTests.php
 *
 * To run the code coverage test, 2 steps:
 * #phpunit --report reports/coverage  PHP_DocBlockGenerator_AllTests AllTests.php
 * browse the results in index.html file in reports/coverage
 *
 * The code coverage is close to 100%.
 *
 * @category  PHP
 * @package   PHP_DocBlockGenerator
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2007 Michel Corne
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/PHP_DocBlockGenerator
 */
class PHP_DocBlockGenerator_AllTests
{
    /**
     * Runs the test suite
     *
     * @return void
     * @access public
     * @static
     */
    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    /**
     * Runs the test suite
     *
     * @return object the PHPUnit_Framework_TestSuite object
     * @access public
     * @static
     */
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('PHP_DocBlockGenerator Tests');
        $suite->addTestSuite('tests_DocBlockGeneratorTest');
        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'PHP_DocBlockGenerator_AllTests::main') {
    PHP_DocBlockGenerator_AllTests::main();
}

?>