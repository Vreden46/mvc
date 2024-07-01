<?php
function scan_php_files($directory) {
    $php_files = [];
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($directory)
    );

    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            $php_files[] = $file->getPathname();
        }
    }

    return $php_files;
}

$directory_to_scan = '/app/View/AB';
$php_files = scan_php_files($directory_to_scan);

foreach ($php_files as $file) {
    echo "$file\n";
}
?>