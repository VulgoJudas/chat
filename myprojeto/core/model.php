<?php
class model {

	protected $pdo;

	public function __construct() {
		global $pdo;
		$this->pdo = $pdo;
	}

}