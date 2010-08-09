@ECHO OFF

REM
REM DocBlock Generator DOS script
REM
REM Command line usage: docblockgen -h
REM
REM All rights reserved.
REM Redistribution and use in source and binary forms, with or without modification,
REM are permitted provided that the following conditions are met:
REM + Redistributions of source code must retain the above copyright notice,
REM this list of conditions and the following disclaimer.
REM + Redistributions in binary form must reproduce the above copyright notice,
REM this list of conditions and the following disclaimer in the documentation and/or
REM other materials provided with the distribution.
REM + The names of its contributors may be not used to endorse or
REM promote products derived from this software without specific prior written permission.
REM THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
REM "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
REM LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
REM A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR
REM CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
REM EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
REM PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
REM PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
REM LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
REM NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
REM SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
REM
REM @category  PHP
REM @package   PHP_DocBlockGenerator
REM @author    Michel Corne <mcorne@yahoo.com>
REM @copyright 2007 Michel Corne
REM @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
REM @version   SVN: $Id: docblockgen.bat 15 2007-06-27 07:07:48Z mcorne $
REM @link      http://pear.php.net/package/PHP_DocBlockGenerator
REM @see       scripts/docblockgen
REM

REM Replace @php_bin@ with the full/relative path/name of the PHP executable
REM DOS example: SET PHP="C:\Program Files\php\php.exe"
SET PHP="@php_bin@"

REM Replace @bin_dir@ with the full/relative path/name of the docblockgen executable
REM DOS example: SET DOCBLOCKGENSHELL="scripts\docblockgen"
SET DOCBLOCKGENSHELL="@bin_dir@\docblockgen"

REM runs the PHP command line on the docblockgen shell script and passes all the arguments/options
%PHP% %DOCBLOCKGENSHELL% %*

@ECHO ON
