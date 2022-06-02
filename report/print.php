<?php
$content = "
<page>
<h1>Example</h1>
<br>
Ceci <a href='http://html2pdf.fr/'>HTML2PDF</a>.<br>
</page>
";
 require_once('../asset/html2pdf/html2pdf.class.php');
        $html2pdf = new HTML2PDF('P', 'A4', 'en');

  
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('exemple.pdf');

?>