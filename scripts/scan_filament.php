<?php
$root = __DIR__ . '/../';
$dir = $root . 'app/Filament';
$rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
$files = [];
foreach ($rii as $file) {
    if ($file->isDir()) continue;
    if ($file->getExtension() !== 'php') continue;
    $files[] = $file->getPathname();
}

function getNamespaceAndClass($path) {
    $content = file_get_contents($path);
    $namespace = null; $class = null;
    if (preg_match('/^namespace\s+([^;]+);/m', $content, $m)) {
        $namespace = trim($m[1]);
    }
    if (preg_match('/class\s+([A-Za-z0-9_]+)/m', $content, $m)) {
        $class = $m[1];
    }
    if ($namespace && $class) return $namespace . '\\' . $class;
    return null;
}

$allFiles = [];
foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root)) as $f) {
    if ($f->isDir()) continue;
    $p = $f->getPathname();
    // skip vendor and node_modules
    if (strpos($p, DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR) !== false) continue;
    if (strpos($p, DIRECTORY_SEPARATOR . 'node_modules' . DIRECTORY_SEPARATOR) !== false) continue;
    if (pathinfo($p, PATHINFO_EXTENSION) === 'php') $allFiles[] = $p;
}

$results = [];
foreach ($files as $f) {
    $fqcn = getNamespaceAndClass($f);
    if (!$fqcn) continue;
    $short = substr($fqcn, strrpos($fqcn, '\\') + 1);

    $count = 0;
    foreach ($allFiles as $af) {
        if ($af === $f) continue;
        $c = file_get_contents($af);
        if (strpos($c, $fqcn) !== false || strpos($c, $short) !== false) {
            $count++;
        }
    }
    $results[] = [
        'file' => str_replace($root, '', $f),
        'fqcn' => $fqcn,
        'short' => $short,
        'references' => $count,
        'mtime' => filemtime($f),
    ];
}

usort($results, function($a, $b){ return $a['references'] <=> $b['references']; });

echo json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;