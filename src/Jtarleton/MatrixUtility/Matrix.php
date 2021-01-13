<?php
namespace Jtarleton\MatrixUtility;

class Matrix {

	/**
	 * @param int
	 * @param int  
	 * @return int
	 */
	public static function multiply(int $a, int $b) {
		 $c = $a * $b; 
		 echo '___________'.$a . ' times ' . $b .' equals '. $c .PHP_EOL;
		 return $c;
	}

	/**  
	 * @param array 
	 */
	public static function new_counts_row(array $ct_row) {
		$jt_singleton = JtSingleton::getInstance();
		$jt_singleton->counts_rows[] = $ct_row;
	}

	/**
	 * @param array
	 * @param array
	 * @param int
	 * @param int 
	 * @return void
	 */
	public static function do_calculation(array $a, array $b, int $number, int $index) {
		$col = 'col';
		$jt_singleton = JtSingleton::getInstance();
		$col0= array_column($b, 0);
		$col1 = array_column($b, 1);
		$j = 0; $sum=0;
		$logcol = NULL;
		foreach ($a as $ind=>$row) {
			if ($j > 0) {
				break;
			}
			$i = 0;
			foreach ($row as $value) { 
				$col = 'col' . $number;
				echo (!isset($logcol)) ? "- Row $index -- Reading ".$col .PHP_EOL : NULL;
				$logcol = true;
				$product = self::multiply($value, @${$col}[$i]);
				$i++; 
				$sum+=$product;
			}
			$j++;
			$jt_singleton->counts[$number] = $sum;
		}
	}

	/**
	 * @param array
	 * @param array
	 * @param array 
	 * @return array
	 */
	public static function do_row_calculation(array $a, array $b, int $index) {
		$result_array = [];
		$i = 0;
		$j = 0;
		$jt_singleton = JtSingleton::getInstance();
		self::do_calculation($a, $b, 0, $index);
		self::do_calculation($a, $b, 1, $index);
		return $jt_singleton->counts;
	}

	/**
	 * @param array
	 * @param array
	 * @param array
	 * @return array	 
	 */
	public static function main(JtSingleton $jt_singleton, array $matrix1, array $matrix2) {
		for ($i=0; $i < sizeof($matrix1); $i++) {
			$rs = self::do_row_calculation([$matrix1[$i]], $matrix2, $i);
			self::new_counts_row($rs); 
		}
		return $jt_singleton->counts_rows; 
	} 
}


