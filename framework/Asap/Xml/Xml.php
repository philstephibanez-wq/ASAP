<?php
declare(strict_types=1);
namespace ASAP\Xml;
use SimpleXMLElement;
/*
 * ASAP_REFBOOK:
 *   domain: XML
 *   role: Class Xml belongs to the XML ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the XML domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - xml-overview
 *   diagrams:
 *     - xml-runtime
 * END_ASAP_REFBOOK
 */
final class Xml
{
    public function fromString(string $xml): SimpleXMLElement { $node = simplexml_load_string($xml); if (!$node instanceof SimpleXMLElement) { throw new \RuntimeException('ASAP_XML_STRING_INVALID'); } return $node; }
    public function fromFile(string $file): SimpleXMLElement { if (!is_file($file)) { throw new \RuntimeException('ASAP_XML_FILE_MISSING: ' . $file); } $node = simplexml_load_file($file); if (!$node instanceof SimpleXMLElement) { throw new \RuntimeException('ASAP_XML_FILE_INVALID: ' . $file); } return $node; }
}
