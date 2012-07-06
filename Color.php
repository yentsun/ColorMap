<?php

class Color {

	private $_map_name = null;
	public $hsv = null;
	public $rgb = null;
	public $cmyk = null;
	public $hex = null;

	public function __construct($name) {
		
		$this->original_name = $name;
		$this->clean_name = mb_convert_case($name, MB_CASE_LOWER, 'UTF-8');
		$this->hash = md5($this->clean_name);
		$this->_lookup();
	}

	private function _lookup() {
		
		if (($handle = fopen(dirname(__FILE__).'/map.csv','r')) !== false) {
			while (($string = fgets($handle, 300)) !== false) {
				$row = explode(';', $string);
				if (mb_convert_case($row[0], MB_CASE_LOWER, 'UTF-8') == $this->clean_name) {
					list(
						$this->_map_name,
						$this->hsv,
						$this->rgb,
						$this->cmyk,
						$this->hex
					) = 
						$row;
					break;
				}
			}	
			fclose($handle);
		}
	}
}
