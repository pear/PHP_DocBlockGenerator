call pear uninstall  --ignore-errors PHP_DocBlockGenerator
call pear package-validate package2.xml
call pear package package2.xml
call pear install PHP_DocBlockGenerator-1.1.1.tgz