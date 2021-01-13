<?php
require __DIR__ . '/vendor/autoload.php';

$matrix1 = [
	[1,2,3],
	[4,5,6],
	[7,8,9]
];

$matrix2 = [
	[7,8],
	[9,10],
	[11,12]
];
$jt_singleton =  \Jtarleton\MatrixUtility\JtSingleton::getInstance();
echo var_export(\Jtarleton\MatrixUtility\Matrix::main($jt_singleton, $matrix1, $matrix2), TRUE);

