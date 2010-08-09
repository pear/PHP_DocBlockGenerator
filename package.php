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
 * @version   SVN: $Id: package.php 31 2007-09-13 10:21:01Z mcorne $
 * @link      http://pear.php.net/package/PHP_DocBlockGenerator
 * @see       http://manual.phpdoc.org
 * @todo      process VIM header/footer
 * @todo      generate SVN or CVS tags optionally
 * @todo      process multiple files/directories
 * @toto      build other files page DocBlocks from the main file/class page DocBlock
 * @toto      write a simple web interface
 */

require_once 'PEAR/PackageFileBuilder.php';
// require_once 'PEAR/Installer.php';
/**
 * Creation of the package XML file
 *
 * @category  PHP
 * @package   PHP_DocBlockGenerator
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2007 Michel Corne
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/PHP_DocBlockGenerator
 */

class package extends Pear_PackageFileBuilder
{
    protected $config = array(// /
        '_main_file' => 'DocBlockGenerator.php',
        '_windows_release' => array(array(false, 'basename', 'run.bat')),
        );

    protected $param = array(// /
        'version' => '1.1.1',
        'stability' => 'stable',
        'notes' => array(// /
            '* Fixed Bug #11984: static protected $variable noted correctly detected',
            ),
        'dependencies' => array(// /
            'required' => array(// /
                'php' => array('min' => '5.0'),
                'pearinstaller' => array('min' => '1.4.0'),
                'package' => array(// /
                    array('name' => 'Console_Getopt', 'channel' => 'pear.php.net'),
                    array('name' => 'PHP_CompatInfo', 'channel' => 'pear.php.net'),
                    ),
                )),
        'changelog' => array(// /
            array('1.1.0', 'stable', '2007-07-23', array(// /
                   '* Added enhancement request Bug #11663: implementation for \'interface\'',
                   '* Added functionality to process abstract class/function',
                   '* Fixed generation of class version tag: @package_version@',
                   '* Fixed BSD license text to comply with the 85 character limit per line',
            )),
            array('1.0.2', 'stable', '2007-07-19', array(// /
                    '* Fixed Bug #11622: static private function and final class not correctly detected',
                    '* Fixed Bug #11575: "bad interpreter" error on linux, @php_bin@ enclosed in double-quotes',
                    '* Fixed tests to run for non PEAR install',
                    '* Changed tests to keep generated files to make debugging easier'),
                ),
            array('1.0.1', 'stable', '2007-07-07', array('* Changed the AllTests main class name to comply with the QA PEAR-wide unit test')),
            array('1.0.0', 'stable', '2007-07-06', array('* Initial stable release', '* Fixed regression on -A option')),
            array('1.0.0RC1', 'beta', '2007-06-29', array(// /
                    '* Initial PEAR release', '* Testing with PHPUnit',
                    '* Using PHPCompat to determine the PHP version',
                    '* Using Consol_Getopt for the CLI',
                    '* Various fixes and enhancements')),
            array('0.2', 'beta', '2007-06-11', array('* Split into classes', '* Various fixes and enhancements')),
            array('0.1', 'beta', '2007-04-28', array('* Initial release in sourceforge'))),
        );
}

$package = new package(__FILE__);
$package->generate();
// $installer = new PEAR_Installer;
// $err = $installer->uninstall('PHP_DocBlockGenerator');
// PEAR::isError($err) and exit($err->getMessage());

?>