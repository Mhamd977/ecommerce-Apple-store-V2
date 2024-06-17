<?php
$currentDirectory = getcwd();
echo 'Current Directory: ' . $currentDirectory;

$directoryPath = realpath($currentDirectory . '/custom_images');
echo "<br>";
echo $directoryPath;
echo "<br>";
if (file_exists($directoryPath)) {
    if (is_writable($directoryPath)) {
        echo 'The directory is writable.';
    } else {
        if (chmod($directoryPath, 0777)) {
            echo 'Directory is now writable.';
        } else {
            echo 'Failed to make the directory writable.';
        }
    }
} else {
    echo "not here";
}
?>