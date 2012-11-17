<?php

class CodeBreaker {

	private $solved;

	public function __construct(
	) {
		$this->solved = false;
	}

	public function guess(
	) {
		if ($this->solved) {
			return "Yay! I win!";
		}
		return "AAAA";
	}

	public function score(
		$theScore
	) {
		$this->solved = true;
	}

}
