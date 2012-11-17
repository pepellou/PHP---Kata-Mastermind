<?php

include_once dirname(__FILE__).'/../src/CodeBreaker.php';

class CodeBreakerTest extends PHPUnit_Framework_TestCase {

	private $aCodeBReaker;

	public function setUp(
	) {
		$this->aCodeBreaker = new CodeBreaker();
	}

	public function test_firstGuessIsAAAA(
	) {
		$this->assertEquals(
			"AAAA",
			$this->aCodeBreaker->guess()
		);
	}

	public function test_ifScoreIsPerfectBreakerYays(
	) {
		$this->aCodeBreaker->score('++++');
		$this->assertEquals(
			"Yay! I win!",
			$this->aCodeBreaker->guess()
		);
	}

}
