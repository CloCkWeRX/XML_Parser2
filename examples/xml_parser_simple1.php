<?PHP
/**
 * example for XML_Parser2_Simple
 *
 * $Id$
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Parser2
 * @subpackage  Examples
 */

/**
 * require the parser
 */
require_once 'XML/Parser2/Simple.php';

class myParser extends XML_Parser2_Simple
{
   /**
    * handle the element
    *
    * The element will be handled, once it's closed
    *
    * @access   private
    * @param    string      name of the element
    * @param    array       attributes of the element
    * @param    string      character data of the element
    */
    function handleElement($name, $attribs, $data)
    {
        printf('handling %s in tag depth %d<br />', $name, $this->getCurrentDepth());
        printf('character data: %s<br />', $data );
        print 'Attributes:<br />';
        print '<pre>';
        print_r( $attribs );
        print '</pre>';
        print '<br />';
    }
}

$p = new myParser2();

$result = $p->setInputFile('xml_parser_simple1.xml');
$result = $p->parse();
?>
