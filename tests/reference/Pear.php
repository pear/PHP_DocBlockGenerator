<?php

/**
 * Short description for file
 *
 * Long description (if any) ...
 *
 * PHP versions 4 and 5
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
 * @package   PEAR
 * @author    Author's name <author@mail.com>
 * @copyright 2007 Author's name
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   CVS: $Id: Pear.php 29 2007-07-23 16:25:54Z mcorne $
 * @link      http://pear.php.net/package/PEAR
 * @see       References to other sections (if any)...
 */

/**
 * Description for define
 */
define('PEAR_ERROR_RETURN',     1);

/**
 * Description for define
 */
define('PEAR_ERROR_PRINT',      2);

/**
 * Description for define
 */
define('PEAR_ERROR_TRIGGER',    4);

/**
 * Description for define
 */
define('PEAR_ERROR_DIE',        8);

/**
 * Description for define
 */
define('PEAR_ERROR_CALLBACK',  16);

/**
 * Description for define
 */
define('PEAR_ERROR_EXCEPTION', 32);

/**
 * Description for define
 */
define('PEAR_ZE2', (function_exists('version_compare') &&
                    version_compare(zend_version(), "2-dev", "ge")));

if (substr(PHP_OS, 0, 3) == 'WIN') {

/**
 * Description for define
 */
    define('OS_WINDOWS', true);

/**
 * Description for define
 */
    define('OS_UNIX',    false);

/**
 * Description for define
 */
    define('PEAR_OS',    'Windows');
} else {

/**
 * Description for define
 */
    define('OS_WINDOWS', false);

/**
 * Description for define
 */
    define('OS_UNIX',    true);

/**
 * Description for define
 */
    define('PEAR_OS',    'Unix'); // blatant assumption
}

// instant backwards compatibility
if (!defined('PATH_SEPARATOR')) {
    if (OS_WINDOWS) {

/**
 * Description for define
 */
        define('PATH_SEPARATOR', ';');
    } else {

/**
 * Description for define
 */
        define('PATH_SEPARATOR', ':');
    }
}

/**
 * Description for $GLOBALS
 * @global integer $GLOBALS['_PEAR_default_error_mode']
 * @name   $_PEAR_default_error_mode
 */
$GLOBALS['_PEAR_default_error_mode']     = PEAR_ERROR_RETURN;

/**
 * Description for $GLOBALS
 * @global integer $GLOBALS['_PEAR_default_error_options']
 * @name   $_PEAR_default_error_options
 */
$GLOBALS['_PEAR_default_error_options']  = E_USER_NOTICE;

/**
 * Description for $GLOBALS
 * @global array $GLOBALS['_PEAR_destructor_object_list']
 * @name   $_PEAR_destructor_object_list
 */
$GLOBALS['_PEAR_destructor_object_list'] = array();

/**
 * Description for $GLOBALS
 * @global array $GLOBALS['_PEAR_shutdown_funcs']
 * @name   $_PEAR_shutdown_funcs
 */
$GLOBALS['_PEAR_shutdown_funcs']         = array();

/**
 * Description for $GLOBALS
 * @global mixed $GLOBALS['_PEAR_error_handler_stack']
 * @name   $_PEAR_error_handler_stack
 */
$GLOBALS['_PEAR_error_handler_stack']    = array();

@ini_set('track_errors', true);

/**
 * Short description for class
 *
 * Long description (if any) ...
 *
 * @category  CategoryName
 * @package   PEAR
 * @author    Author's name <author@mail.com>
 * @copyright 2007 Author's name
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/PEAR
 * @see       References to other sections (if any)...
 */
class PEAR
{

    /**
     * Description for var
     * @var    boolean
     * @access private
     */
    var $_debug = false;

    /**
     * Description for var
     * @var    integer
     * @access private
     */
    var $_default_error_mode = null;

    /**
     * Description for var
     * @var    integer
     * @access private
     */
    var $_default_error_options = null;

    /**
     * Description for var
     * @var    string
     * @access private
     */
    var $_default_error_handler = '';

    /**
     * Description for var
     * @var    string
     * @access private
     */
    var $_error_class = 'PEAR_Error';

    /**
     * Description for var
     * @var    array
     * @access private
     */
    var $_expected_errors = array();

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $error_class Parameter description (if any) ...
     * @return void
     * @access public
     */
    function PEAR($error_class = null)
    {
        $classname = strtolower(get_class($this));
        if ($this->_debug) {
            print "PEAR constructor called, class=$classname\n";
        }
        if ($error_class !== null) {
            $this->_error_class = $error_class;
        }
        while ($classname && strcasecmp($classname, "pear")) {
            $destructor = "_$classname";
            if (method_exists($this, $destructor)) {
                global $_PEAR_destructor_object_list;
                $_PEAR_destructor_object_list[] = &$this;
                if (!isset($GLOBALS['_PEAR_SHUTDOWN_REGISTERED'])) {
                    register_shutdown_function("_PEAR_call_destructors");
                    $GLOBALS['_PEAR_SHUTDOWN_REGISTERED'] = true;
                }
                break;
            } else {
                $classname = get_parent_class($classname);
            }
        }
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return void
     * @access private
     */
    function _PEAR() {
        if ($this->_debug) {
            printf("PEAR destructor called, class=%s\n", strtolower(get_class($this)));
        }
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $class Parameter description (if any) ...
     * @param  unknown $var   Parameter description (if any) ...
     * @return array   Return description (if any) ...
     * @access public
     */
    function &getStaticProperty($class, $var)
    {
        static $properties;
        return $properties[$class][$var];
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $func Parameter description (if any) ...
     * @param  array   $args Parameter description (if any) ...
     * @return void
     * @access public
     */
    function registerShutdownFunc($func, $args = array())
    {
        $GLOBALS['_PEAR_shutdown_funcs'][] = array($func, $args);
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  object  $data Parameter description (if any) ...
     * @param  unknown $code Parameter description (if any) ...
     * @return mixed   Return description (if any) ...
     * @access public
     */
    function isError($data, $code = null)
    {
        if (is_a($data, 'PEAR_Error')) {
            if (is_null($code)) {
                return true;
            } elseif (is_string($code)) {
                return $data->getMessage() == $code;
            } else {
                return $data->getCode() == $code;
            }
        }
        return false;
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $mode    Parameter description (if any) ...
     * @param  unknown $options Parameter description (if any) ...
     * @return void
     * @access public
     */
    function setErrorHandling($mode = null, $options = null)
    {
        if (isset($this) && is_a($this, 'PEAR')) {
            $setmode     = &$this->_default_error_mode;
            $setoptions  = &$this->_default_error_options;
        } else {
            $setmode     = &$GLOBALS['_PEAR_default_error_mode'];
            $setoptions  = &$GLOBALS['_PEAR_default_error_options'];
        }

        switch ($mode) {
            case PEAR_ERROR_EXCEPTION:
            case PEAR_ERROR_RETURN:
            case PEAR_ERROR_PRINT:
            case PEAR_ERROR_TRIGGER:
            case PEAR_ERROR_DIE:
            case null:
                $setmode = $mode;
                $setoptions = $options;
                break;

            case PEAR_ERROR_CALLBACK:
                $setmode = $mode;
                // class/object method callback
                if (is_callable($options)) {
                    $setoptions = $options;
                } else {
                    trigger_error("invalid error callback", E_USER_WARNING);
                }
                break;

            default:
                trigger_error("invalid error mode", E_USER_WARNING);
                break;
        }
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  string $code Parameter description (if any) ...
     * @return array  Return description (if any) ...
     * @access public
     */
    function expectError($code = '*')
    {
        if (is_array($code)) {
            array_push($this->_expected_errors, $code);
        } else {
            array_push($this->_expected_errors, array($code));
        }
        return sizeof($this->_expected_errors);
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return array  Return description (if any) ...
     * @access public
     */
    function popExpect()
    {
        return array_pop($this->_expected_errors);
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $error_code Parameter description (if any) ...
     * @return boolean Return description (if any) ...
     * @access private
     */
    function _checkDelExpect($error_code)
    {
        $deleted = false;

        foreach ($this->_expected_errors AS $key => $error_array) {
            if (in_array($error_code, $error_array)) {
                unset($this->_expected_errors[$key][array_search($error_code, $error_array)]);
                $deleted = true;
            }

            // clean up empty arrays
            if (0 == count($this->_expected_errors[$key])) {
                unset($this->_expected_errors[$key]);
            }
        }
        return $deleted;
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  array  $error_code Parameter description (if any) ...
     * @return mixed  Return description (if any) ...
     * @access public
     */
    function delExpect($error_code)
    {
        $deleted = false;

        if ((is_array($error_code) && (0 != count($error_code)))) {
            // $error_code is a non-empty array here;
            // we walk through it trying to unset all
            // values
            foreach($error_code as $key => $error) {
                if ($this->_checkDelExpect($error)) {
                    $deleted =  true;
                } else {
                    $deleted = false;
                }
            }
            return $deleted ? true : PEAR::raiseError("The expected error you submitted does not exist"); // IMPROVE ME
        } elseif (!empty($error_code)) {
            // $error_code comes alone, trying to unset it
            if ($this->_checkDelExpect($error_code)) {
                return true;
            } else {
                return PEAR::raiseError("The expected error you submitted does not exist"); // IMPROVE ME
            }
        } else {
            // $error_code is empty
            return PEAR::raiseError("The expected error you submitted is empty"); // IMPROVE ME
        }
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  object  $message     Parameter description (if any) ...
     * @param  unknown $code        Parameter description (if any) ...
     * @param  integer $mode        Parameter description (if any) ...
     * @param  unknown $options     Parameter description (if any) ...
     * @param  unknown $userinfo    Parameter description (if any) ...
     * @param  unknown $error_class Parameter description (if any) ...
     * @param  boolean $skipmsg     Parameter description (if any) ...
     * @return unknown Return description (if any) ...
     * @access public
     */
    function &raiseError($message = null,
                         $code = null,
                         $mode = null,
                         $options = null,
                         $userinfo = null,
                         $error_class = null,
                         $skipmsg = false)
    {
        // The error is yet a PEAR error object
        if (is_object($message)) {
            $code        = $message->getCode();
            $userinfo    = $message->getUserInfo();
            $error_class = $message->getType();
            $message->error_message_prefix = '';
            $message     = $message->getMessage();
        }

        if (isset($this) && isset($this->_expected_errors) && sizeof($this->_expected_errors) > 0 && sizeof($exp = end($this->_expected_errors))) {
            if ($exp[0] == "*" ||
                (is_int(reset($exp)) && in_array($code, $exp)) ||
                (is_string(reset($exp)) && in_array($message, $exp))) {
                $mode = PEAR_ERROR_RETURN;
            }
        }
        // No mode given, try global ones
        if ($mode === null) {
            // Class error handler
            if (isset($this) && isset($this->_default_error_mode)) {
                $mode    = $this->_default_error_mode;
                $options = $this->_default_error_options;
            // Global error handler
            } elseif (isset($GLOBALS['_PEAR_default_error_mode'])) {
                $mode    = $GLOBALS['_PEAR_default_error_mode'];
                $options = $GLOBALS['_PEAR_default_error_options'];
            }
        }

        if ($error_class !== null) {
            $ec = $error_class;
        } elseif (isset($this) && isset($this->_error_class)) {
            $ec = $this->_error_class;
        } else {
            $ec = 'PEAR_Error';
        }
        if ($skipmsg) {
            $a = &new $ec($code, $mode, $options, $userinfo);
            return $a;
        } else {
            $a = &new $ec($message, $code, $mode, $options, $userinfo);
            return $a;
        }
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $message  Parameter description (if any) ...
     * @param  unknown $code     Parameter description (if any) ...
     * @param  unknown $userinfo Parameter description (if any) ...
     * @return unknown Return description (if any) ...
     * @access public
     */
    function &throwError($message = null,
                         $code = null,
                         $userinfo = null)
    {
        if (isset($this) && is_a($this, 'PEAR')) {
            $a = &$this->raiseError($message, $code, null, null, $userinfo);
            return $a;
        } else {
            $a = &PEAR::raiseError($message, $code, null, null, $userinfo);
            return $a;
        }
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $mode    Parameter description (if any) ...
     * @param  unknown $options Parameter description (if any) ...
     * @return boolean Return description (if any) ...
     * @access public
     */
    function staticPushErrorHandling($mode, $options = null)
    {
        $stack = &$GLOBALS['_PEAR_error_handler_stack'];
        $def_mode    = &$GLOBALS['_PEAR_default_error_mode'];
        $def_options = &$GLOBALS['_PEAR_default_error_options'];
        $stack[] = array($def_mode, $def_options);
        switch ($mode) {
            case PEAR_ERROR_EXCEPTION:
            case PEAR_ERROR_RETURN:
            case PEAR_ERROR_PRINT:
            case PEAR_ERROR_TRIGGER:
            case PEAR_ERROR_DIE:
            case null:
                $def_mode = $mode;
                $def_options = $options;
                break;

            case PEAR_ERROR_CALLBACK:
                $def_mode = $mode;
                // class/object method callback
                if (is_callable($options)) {
                    $def_options = $options;
                } else {
                    trigger_error("invalid error callback", E_USER_WARNING);
                }
                break;

            default:
                trigger_error("invalid error mode", E_USER_WARNING);
                break;
        }
        $stack[] = array($mode, $options);
        return true;
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return boolean Return description (if any) ...
     * @access public
     */
    function staticPopErrorHandling()
    {
        $stack = &$GLOBALS['_PEAR_error_handler_stack'];
        $setmode     = &$GLOBALS['_PEAR_default_error_mode'];
        $setoptions  = &$GLOBALS['_PEAR_default_error_options'];
        array_pop($stack);
        list($mode, $options) = $stack[sizeof($stack) - 1];
        array_pop($stack);
        switch ($mode) {
            case PEAR_ERROR_EXCEPTION:
            case PEAR_ERROR_RETURN:
            case PEAR_ERROR_PRINT:
            case PEAR_ERROR_TRIGGER:
            case PEAR_ERROR_DIE:
            case null:
                $setmode = $mode;
                $setoptions = $options;
                break;

            case PEAR_ERROR_CALLBACK:
                $setmode = $mode;
                // class/object method callback
                if (is_callable($options)) {
                    $setoptions = $options;
                } else {
                    trigger_error("invalid error callback", E_USER_WARNING);
                }
                break;

            default:
                trigger_error("invalid error mode", E_USER_WARNING);
                break;
        }
        return true;
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $mode    Parameter description (if any) ...
     * @param  unknown $options Parameter description (if any) ...
     * @return boolean Return description (if any) ...
     * @access public
     */
    function pushErrorHandling($mode, $options = null)
    {
        $stack = &$GLOBALS['_PEAR_error_handler_stack'];
        if (isset($this) && is_a($this, 'PEAR')) {
            $def_mode    = &$this->_default_error_mode;
            $def_options = &$this->_default_error_options;
        } else {
            $def_mode    = &$GLOBALS['_PEAR_default_error_mode'];
            $def_options = &$GLOBALS['_PEAR_default_error_options'];
        }
        $stack[] = array($def_mode, $def_options);

        if (isset($this) && is_a($this, 'PEAR')) {
            $this->setErrorHandling($mode, $options);
        } else {
            PEAR::setErrorHandling($mode, $options);
        }
        $stack[] = array($mode, $options);
        return true;
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return boolean Return description (if any) ...
     * @access public
     */
    function popErrorHandling()
    {
        $stack = &$GLOBALS['_PEAR_error_handler_stack'];
        array_pop($stack);
        list($mode, $options) = $stack[sizeof($stack) - 1];
        array_pop($stack);
        if (isset($this) && is_a($this, 'PEAR')) {
            $this->setErrorHandling($mode, $options);
        } else {
            PEAR::setErrorHandling($mode, $options);
        }
        return true;
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  string $ext Parameter description (if any) ...
     * @return mixed  Return description (if any) ...
     * @access public
     */
    function loadExtension($ext)
    {
        if (!extension_loaded($ext)) {
            // if either returns true dl() will produce a FATAL error, stop that
            if ((ini_get('enable_dl') != 1) || (ini_get('safe_mode') == 1)) {
                return false;
            }
            if (OS_WINDOWS) {
                $suffix = '.dll';
            } elseif (PHP_OS == 'HP-UX') {
                $suffix = '.sl';
            } elseif (PHP_OS == 'AIX') {
                $suffix = '.a';
            } elseif (PHP_OS == 'OSX') {
                $suffix = '.bundle';
            } else {
                $suffix = '.so';
            }
            return @dl('php_'.$ext.$suffix) || @dl($ext.$suffix);
        }
        return true;
    }

    // }}}
}

/**
 * Short description for function
 *
 * Long description (if any) ...
 *
 * @return void
 */
function _PEAR_call_destructors()
{
    global $_PEAR_destructor_object_list;
    if (is_array($_PEAR_destructor_object_list) &&
        sizeof($_PEAR_destructor_object_list))
    {
        reset($_PEAR_destructor_object_list);
        if (@PEAR::getStaticProperty('PEAR', 'destructlifo')) {
            $_PEAR_destructor_object_list = array_reverse($_PEAR_destructor_object_list);
        }
        while (list($k, $objref) = each($_PEAR_destructor_object_list)) {
            $classname = get_class($objref);
            while ($classname) {
                $destructor = "_$classname";
                if (method_exists($objref, $destructor)) {
                    $objref->$destructor();
                    break;
                } else {
                    $classname = get_parent_class($classname);
                }
            }
        }
        // Empty the object list to ensure that destructors are
        // not called more than once.
        $_PEAR_destructor_object_list = array();
    }

    // Now call the shutdown functions
    if (is_array($GLOBALS['_PEAR_shutdown_funcs']) AND !empty($GLOBALS['_PEAR_shutdown_funcs'])) {
        foreach ($GLOBALS['_PEAR_shutdown_funcs'] as $value) {
            call_user_func_array($value[0], $value[1]);
        }
    }
}

/**
 * Short description for class
 *
 * Long description (if any) ...
 *
 * @category  CategoryName
 * @package   PEAR
 * @author    Author's name <author@mail.com>
 * @copyright 2007 Author's name
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/PEAR
 * @see       References to other sections (if any)...
 */
class PEAR_Error
{

    /**
     * Description for var
     * @var    string
     * @access public
     */
    var $error_message_prefix = '';

    /**
     * Description for var
     * @var    integer
     * @access public
     */
    var $mode                 = PEAR_ERROR_RETURN;

    /**
     * Description for var
     * @var    integer
     * @access public
     */
    var $level                = E_USER_NOTICE;

    /**
     * Description for var
     * @var    unknown
     * @access public
     */
    var $code                 = -1;

    /**
     * Description for var
     * @var    string
     * @access public
     */
    var $message              = '';

    /**
     * Description for var
     * @var    string
     * @access public
     */
    var $userinfo             = '';

    /**
     * Description for var
     * @var    array
     * @access public
     */
    var $backtrace            = null;


    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  string  $message  Parameter description (if any) ...
     * @param  unknown $code     Parameter description (if any) ...
     * @param  integer $mode     Parameter description (if any) ...
     * @param  integer $options  Parameter description (if any) ...
     * @param  unknown $userinfo Parameter description (if any) ...
     * @return void
     * @access public
     */
    function PEAR_Error($message = 'unknown error', $code = null,
                        $mode = null, $options = null, $userinfo = null)
    {
        if ($mode === null) {
            $mode = PEAR_ERROR_RETURN;
        }
        $this->message   = $message;
        $this->code      = $code;
        $this->mode      = $mode;
        $this->userinfo  = $userinfo;
        if (function_exists("debug_backtrace")) {
            if (@!PEAR::getStaticProperty('PEAR_Error', 'skiptrace')) {
                $this->backtrace = debug_backtrace();
            }
        }
        if ($mode & PEAR_ERROR_CALLBACK) {
            $this->level = E_USER_NOTICE;
            $this->callback = $options;
        } else {
            if ($options === null) {
                $options = E_USER_NOTICE;
            }
            $this->level = $options;
            $this->callback = null;
        }
        if ($this->mode & PEAR_ERROR_PRINT) {
            if (is_null($options) || is_int($options)) {
                $format = "%s";
            } else {
                $format = $options;
            }
            printf($format, $this->getMessage());
        }
        if ($this->mode & PEAR_ERROR_TRIGGER) {
            trigger_error($this->getMessage(), $this->level);
        }
        if ($this->mode & PEAR_ERROR_DIE) {
            $msg = $this->getMessage();
            if (is_null($options) || is_int($options)) {
                $format = "%s";
                if (substr($msg, -1) != "\n") {
                    $msg .= "\n";
                }
            } else {
                $format = $options;
            }
            die(sprintf($format, $msg));
        }
        if ($this->mode & PEAR_ERROR_CALLBACK) {
            if (is_callable($this->callback)) {
                call_user_func($this->callback, $this);
            }
        }
        if ($this->mode & PEAR_ERROR_EXCEPTION) {
            trigger_error("PEAR_ERROR_EXCEPTION is obsolete, use class PEAR_Exception for exceptions", E_USER_WARNING);
            eval('$e = new Exception($this->message, $this->code);throw($e);');
        }
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return integer Return description (if any) ...
     * @access public
     */
    function getMode() {
        return $this->mode;
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return unknown Return description (if any) ...
     * @access public
     */
    function getCallback() {
        return $this->callback;
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return string Return description (if any) ...
     * @access public
     */
    function getMessage()
    {
        return ($this->error_message_prefix . $this->message);
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return unknown Return description (if any) ...
     * @access public
     */
     function getCode()
     {
        return $this->code;
     }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return unknown Return description (if any) ...
     * @access public
     */
    function getType()
    {
        return get_class($this);
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return string Return description (if any) ...
     * @access public
     */
    function getUserInfo()
    {
        return $this->userinfo;
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return unknown Return description (if any) ...
     * @access public
     */
    function getDebugInfo()
    {
        return $this->getUserInfo();
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $frame Parameter description (if any) ...
     * @return array   Return description (if any) ...
     * @access public
     */
    function getBacktrace($frame = null)
    {
        if (defined('PEAR_IGNORE_BACKTRACE')) {
            return null;
        }
        if ($frame === null) {
            return $this->backtrace;
        }
        return $this->backtrace[$frame];
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $info Parameter description (if any) ...
     * @return void
     * @access public
     */
    function addUserInfo($info)
    {
        if (empty($this->userinfo)) {
            $this->userinfo = $info;
        } else {
            $this->userinfo .= " ** $info";
        }
    }

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return mixed  Return description (if any) ...
     * @access public
     */
    function toString() {
        $modes = array();
        $levels = array(E_USER_NOTICE  => 'notice',
                        E_USER_WARNING => 'warning',
                        E_USER_ERROR   => 'error');
        if ($this->mode & PEAR_ERROR_CALLBACK) {
            if (is_array($this->callback)) {
                $callback = (is_object($this->callback[0]) ?
                    strtolower(get_class($this->callback[0])) :
                    $this->callback[0]) . '::' .
                    $this->callback[1];
            } else {
                $callback = $this->callback;
            }
            return sprintf('[%s: message="%s" code=%d mode=callback '.
                           'callback=%s prefix="%s" info="%s"]',
                           strtolower(get_class($this)), $this->message, $this->code,
                           $callback, $this->error_message_prefix,
                           $this->userinfo);
        }
        if ($this->mode & PEAR_ERROR_PRINT) {
            $modes[] = 'print';
        }
        if ($this->mode & PEAR_ERROR_TRIGGER) {
            $modes[] = 'trigger';
        }
        if ($this->mode & PEAR_ERROR_DIE) {
            $modes[] = 'die';
        }
        if ($this->mode & PEAR_ERROR_RETURN) {
            $modes[] = 'return';
        }
        return sprintf('[%s: message="%s" code=%d mode=%s level=%s '.
                       'prefix="%s" info="%s"]',
                       strtolower(get_class($this)), $this->message, $this->code,
                       implode("|", $modes), $levels[$this->level],
                       $this->error_message_prefix,
                       $this->userinfo);
    }

}

?>
