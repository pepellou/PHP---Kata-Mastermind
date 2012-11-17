<?php

class CodeBreaker {

	private $solved;
	private $guesses;
	private $current_guess;

	public function __construct(
	) {
		$this->solved = false;
		$this->guesses = array(
			'AAAA',
			'ABCD',
			'ABDC',
			'ACBD',
			'BACD',
			'BCAD',
			'BACD',
			'BCDA',
			'BCDA',
			'BACD',
		);
		$this->current_guess = 0;
	}

	public function guess(
	) {
		if ($this->solved) {
			return "Yay! I win!";
		}
		return $this->guesses[$this->current_guess++];
	}

	public function score(
		$theScore
	) {
		if ($theScore == "++++") {
			$this->solved = true;
		}
	}

}
