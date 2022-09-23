<?php

// Directories to not scan
$excludeDirs = [
    'vendor/'
];

// Files to not scan
$excludeFiles = [
    'config/app.php'
];

// Create a new CS Fixer Finder instance
$finder = PhpCsFixer\Finder::create()->in(__DIR__)
    ->exclude($excludeDirs)
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
    ->filter(function (\SplFileInfo $file) use ($excludeFiles) {
    return ! in_array($file->getRelativePathName(), $excludeFiles);
});

return Cartalyst\PhpCsFixer\Config::create()->setFinder($finder);