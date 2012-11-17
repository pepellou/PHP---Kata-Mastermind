<?php

class CodeBreaker {

	private $solved;
	private $guesses;

	public function __construct(
	) {
		$this->solved = false;
		$this->guesses = array();
	}

	public function guess(
	) {
		if ($this->solved) {
			return "Yay! I win!";
		}
		$current_guess = "AAAA";
		if ($this->guesses != array()) {
			$current_guess .= count($this->guesses);
		}
		$this->guesses[] = $current_guess;
		return $current_guess;
	}

	public function score(
		$theScore
	) {
		if ($theScore == "++++") {
			$this->solved = true;
		}
	}

}
