<?php
class Plugin_transform extends Plugin
{
    var $meta = array(
        'name'       => 'Transform',
        'version'    => '0.1',
        'author'     => 'Brian Zerangue',
        'author_url' => 'http://brianzerangue.com'
    );

    function index()
    {
        $xml = $this->fetch_param('xml');

        $xsl = $this->fetch_param('xsl');

        // Load the XML source
        $xmldoc = new DOMDocument;
        $xmldoc->load($xml);
 
        // Load XSLT stylesheet
        $xsldoc = new DOMDocument;
        $xsldoc->load($xsl);
 
        // Configure the transformer
        $proc = new XSLTProcessor;
        $proc->importStyleSheet($xsldoc); // attach the xsl rules
     
        $transformed = $proc->transformToXML($xmldoc);

        return $transformed;
    }

}