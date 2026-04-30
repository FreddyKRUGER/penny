<?php
// check_lnk.php
$file = __DIR__ . '/Property_Photos.pdf.lnk';

echo "File exists: " . (file_exists($file) ? "YES" : "NO") . "\n";
echo "File size: " . (file_exists($file) ? filesize($file) : 0) . " bytes\n";

if (file_exists($file)) {
    $data = file_get_contents($file, false, null, 0, 4);
    echo "Magic bytes: " . strtoupper(bin2hex($data)) . "\n";
    echo "Expected: 4C000000\n";
    
    // Also show MD5 to compare with your local file
    echo "MD5: " . md5_file($file) . "\n";
}
?>