<?php

class Color {

	public $hsv = null;
	public $rgb = null;
	public $cmyk = null;
	public $hex = null;

	public function __construct($name) {
		
		$this->original_name = $name;
		$this->clean_name = mb_convert_case($name, MB_CASE_LOWER, 'UTF-8');
		$this->hash = md5($this->clean_name);
		$this->_lookUp();
	}

	private function _lookUp() {
		
		if (($handle = fopen(dirname(__FILE__).'/map.csv','r')) !== FALSE) {
			while (($string = fgets($handle,300)) !== FALSE) {
				$row = explode(';',$string);
				if (mb_convert_case($row[0], MB_CASE_LOWER, 'UTF-8') == $this->clean_name) {
					list(
						,
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
