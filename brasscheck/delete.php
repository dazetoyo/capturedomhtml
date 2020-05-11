<?php
$file = $_GET['img'];
unlink($file);
header("location:javascript://history.go(-1)");
