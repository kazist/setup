<?php

// Read the contents of mybizna/composer.json
$mybiznaComposer = file_get_contents('mybizna/composer.json');

// Read the contents of the root composer.json
$rootComposer = file_get_contents('composer.json');

// Decode the JSON content into associative arrays
$mybiznaData = json_decode($mybiznaComposer, true);
$rootData = json_decode($rootComposer, true);

// Merge the "require" sections
if (isset($mybiznaData['require'])) {
    $rootData['require'] = array_merge($rootData['require'], $mybiznaData['require']);
}

// Merge the "require-dev" sections
if (isset($mybiznaData['require-dev'])) {
    $rootData['require-dev'] = array_merge($rootData['require-dev'], $mybiznaData['require-dev']);
}

// Encode the merged data back to JSON
$mergedComposer = json_encode($rootData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

// Save the merged composer.json to the root folder
file_put_contents('composer.json', $mergedComposer);

echo 'Composer.json merged successfully.';
