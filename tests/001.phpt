--TEST--
XML Parser2: parse simple string
--SKIPIF--
<?php if (!extension_loaded("xml")) echo 'skip'; ?>
--FILE--
<?php
//
// Test for: XML/Parser2.php
// Parts tested: - parser creation
//               - some handlers
//               - parse simple string
//
require_once "XML/Parser2.php";

class __TestParser1 extends XML_Parser2 {

    function startHandler($xp, $element, $attribs) {
        print "<$element";
        reset($attribs);
        while (list($key, $val) = each($attribs)) {
            $enc = htmlentities($val);
            print " $key=\"$enc\"";
        }
        print ">";
    }
    function endHandler($xp, $element) {
        print "</$element>\n";
    }
    function cdataHandler($xp, $cdata) {
        print "<![CDATA[$cdata]]>";
    }
    function defaultHandler($xp, $cdata) {

    }
}
print "new __TestParser1 ";
var_dump(strtolower(get_class($o = new __TestParser1())));
print "parseString ";
var_dump($o->parseString("<?xml version='1.0' ?><root>foo</root>", 1));

?>
--EXPECT--
new __TestParser1 string(13) "__testparser1"
parseString <ROOT><![CDATA[foo]]></ROOT>
bool(true)
