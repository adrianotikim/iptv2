<?php
header("Content-Type: application/octet-stream");
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"list.m3u\""); 

echo readfile('save.list');
