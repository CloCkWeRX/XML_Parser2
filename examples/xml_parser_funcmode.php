<?PHP
/**
 * Example for the func-mode
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Parser2
 * @subpackage  Examples
 */

/**
 * require the parser
 */
require_once 'XML/Parser2.php';

class myParser extends XML_Parser2
{
    function xmltag_foo_bar($xp, $name, $attribs)
    {
        print "handle start foo-bar\n";
    }

    function xmltag_foo_bar_($xp, $name)
    {
        print "handle end foo-bar\n";
    }

    function xmltag_foo($xp, $name)
    {
        print "handle start foo\n";
    }

    function xmltag_foo_($xp, $name)
    {
        print "handle end foo\n";
    }
}

$p = new myParser(null, 'func');

$result = $p->setInputString('<foo><foo-bar/></foo>');
$result = $p->parse();
?>
