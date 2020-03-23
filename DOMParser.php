<?php

//Store your html into $html variable.

$html = '<meta property="og:description" content="Ripoff Report on: Henry Hank  Kleber, Palm Beach Offshore Marine - Henry hank kleber aka palm beach offshore marine he is a con man and thief lake worth florid...">
<table border="0" cellspacing="0" cellpadding="0" bgcolor="#f5f5f5">
                                       <tbody>
                                          <tr>
                                             <td colspan="2" width="100%" height="5">&nbsp;</td>
                                          </tr>
                                          <tr>
                                             <td  nowrap="nowrap" height="25"><span>&nbsp;WorkSource Job Number:&nbsp;</span></td>
                                             <td  nowrap="nowrap" width="100%" height="25"><span><strong>WS442610727</strong></span></td>
                                          </tr>
                                          <tr>
                                             <td nowrap="nowrap"><span>&nbsp;Listed By:</span></td>
                                             <td nowrap="nowrap" width="100%"><span><strong>A-List Trucking, LLC</strong> on <strong>Nov 4, 2014</strong></span></td>
                                          </tr>
                                          <tr>
                                             <td nowrap="nowrap"><span>&nbsp;Last Modified on:</span></td>
                                             <td nowrap="nowrap" width="100%"><span><strong>Nov 4, 2014</strong></span></td>
                                          </tr>
                                          <tr>
                                             <td align="left" nowrap="nowrap"><span>&nbsp;Closes on:</span></td>
                                             <td align="left" nowrap="nowrap" width="100%"><span><strong>Feb 2, 2015</strong></span></td>
                                          </tr>
                                          <tr>
                                             <td colspan="2" width="100%" height="5">&nbsp;</td>
                                          </tr>
                                       </tbody>
                                    </table>
                                    <table border="0" cellspacing="0" cellpadding="0" bgcolor="#f5f5f5">
                                       <tbody>
                                          <tr>
                                             <td class="FormGreyBar" nowrap="nowrap" width="100%">&nbsp;Description</td>
                                          </tr>
                                       </tbody>
                                    </table>
        <div class="content-center">
                  <a href="/">
                     <amp-img height="34" width="190" class="content-logo" src="/assets/images/logos/ripoffreport@2x.png"></amp-img>
                  </a>
               </div>
               <br clear="dd" type="test">
               <hr bgcolor="#000000" width="100px">

';

$tagsAndAttributes = array("td" => array ('nowrap','width', 'height'),
                "hr" =>  array('bgcolor', 'width'),
                 "br" => array ('clear','type')
                 );

$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML($html);

//Evaluate Anchor tag in HTML
$xpath = new DOMXPath($dom);

foreach ($tagsAndAttributes as $key=>$value) {
    
    $hrefs = $xpath->evaluate("//".$key);
    RemoveGivenAttributes($hrefs, $value);
    $html=$dom->saveHTML();
}


echo $html;


function RemoveGivenAttributes($hrefs, $value)
{
    for ($i = 0; $i < $hrefs->length; $i++) {
            $href = $hrefs->item($i);

            foreach($value as $att)
                $href->removeAttribute($att);
    }
}
// save html
?>