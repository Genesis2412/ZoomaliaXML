<?php
$xml = new DOMDocument();
$xml->load( 'clients.xml' );

#start xslt
$xslt = new XSLTProcessor();

#import stylesheet
$xsl = new DOMDocument();
$xsl->load( 'clients.xslt' );
$xslt->importStylesheet($xsl);

#print
    print $xslt->transformToXML($xml);
?>