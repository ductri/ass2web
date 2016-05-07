<html>
<head>
<title>ShotDev.Com Tutorial</title>
</head>
<body>
<?php
    $ppApp = new COM("PowerPoint.Application");
    $ppApp->Visible = True;

    //$strPath = realpath(basename(getenv($_SERVER["SCRIPT_NAME"]))); // C:/AppServ/www/myphp

    $ppName = "abc.pptx";
    $FileName = "MyPP";

    //*** Open Document ***//
    $ppApp->Presentations->Open(dirname(__FILE__)."/".$ppName);

    //*** Save Document ***//
    $ppApp->ActivePresentation->SaveAs(dirname(__FILE__)."/".$FileName,17);  //'*** 18=PNG, 19=BMP **'
    //$ppApp->ActivePresentation->SaveAs(realpath($FileName),17);

    $ppApp->Quit;
    $ppApp = null;
?>
PowerPoint Created to Folder <b><?php
echo $FileName?></b>
</body>
</html>