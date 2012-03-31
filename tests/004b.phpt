--TEST--
XML Parser2: error class (PHP5 behavior)
--SKIPIF--
<?php
if (!extension_loaded('xml')) {
    print 'skip - xml extension not available';
}
?>
--FILE--
<?php
require_once "XML/Parser2.php";

print 'New XML_Parser2:  ';
var_dump(strtolower(get_class($p = new XML_Parser2())));
try  {
    $p->parseString("<?xml version='1.0' ?>\n<foo></bar>", true);
} catch (XML_Parser2_Exception $e) {
    printf("Error message: %s" . PHP_EOL, $e->getMessage());
}
?>
--EXPECT--
New XML_Parser2:  string(10) "xml_parser"
Error message: XML_Parser2: Mismatched tag at XML input line 2:12
