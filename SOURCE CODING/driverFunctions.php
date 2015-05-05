<?php
require_once 'mandril_mailer/Mandrill.php';
require_once("dompdf-0.6.1/dompdf_config.inc.php");
set_time_limit(0);


function getHTMLContent($data)
{
$each = '';
   $html_start =  '<html>
        <head>
        <title>
        Marksheet
        </title>
        </head>
        <body>
        <!-- CSS goes in the document HEAD or added to your external stylesheet -->
        <style type="text/css">
        table.gridtable {
            font-family: verdana,arial,sans-serif;
            font-size:11px;
color:#333333;
      border-width: 1px;
      border-color: #666666;
      border-collapse: collapse;
        }
    table.gridtable th {
        border-width: 1px;
padding: 8px;
         border-style: solid;
         border-color: #666666;
         background-color: #dedede;
    }
    table.gridtable td {
        border-width: 1px;
padding: 8px;
         border-style: solid;
         border-color: #666666;
         background-color: #ffffff;
    }
    </style>
        <!-- Table goes in the document BODY -->
        <table class="gridtable">
        <tr>
        <th>Subject</th><th>Marks</th>
        </tr>';
        $i=0;
        foreach($data as $key => $value){
        $each .= '<tr><td>'.$key.'</td><td>'.$value.'</td></tr>';
        }

    $html_end =  '</table></body></html>';
    $returnData = $html_start.$each.$html_end;
    return $returnData;
}

function getPDFContent($html_string)
{
    $dompdf = new DOMPDF();
    $dompdf->load_html($html_string);
    $dompdf->render();
    //$dompdf->stream("sample.pdf");
    $output = $dompdf->output();
    return $output;

}



function getDetailsFromDB($regno)
{
    $host="localhost";
    $user="root";
    $pass="";
    $db_name="marks";
    mysql_connect($host, $user, $pass);
    mysql_select_db($db_name);
    $sql="SELECT * from `test_marks` WHERE regno=$regno";
    $result=mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
    while($row=mysql_fetch_assoc($result))
    return $row;

}


function generateContent($regno,$data)
{
    $html_string = getHTMLContent($data);
    file_put_contents($regno.".html",$html_string);
    $pdf_string = getPDFContent($html_string);
    file_put_contents($regno.".pdf", $pdf_string);
}

function sendMail($regno,$email)
{

    $mandrill = new Mandrill('AY2Lux1oJMfrNlhZIGumGg'); // this is my API key. Kindly change it to yours after registering
    $contents=file_get_contents($regno.".html");
    $attachment = file_get_contents($regno.".pdf");
    $attachment_encoded = base64_encode($attachment); 
    $message = array(
            'subject' => "Semester Marksheet",
            'html' => $contents, // or just use 'html' to support HTMl markup
            'from_email' => 'examcell@gmail.com',
            'from_name' => 'Examination Cell',
            'to' => array(
                array( // add more sub-arrays for additional recipients
                    'email' => $email,//$row['email'],
                    ),
                ),
            "attachments" => array(
                array(
                    'type' => "application/pdf",
                    'content' => $attachment_encoded,
                    'name' => $regno.".pdf"
                    )),

            /* Other API parameters (e.g., 'preserve_recipients => FALSE', 'track_opens => TRUE',
               'track_clicks' => TRUE) go here */
            );

    $result1 = $mandrill->messages->send($message);
    var_dump($result1);
} 


?>
