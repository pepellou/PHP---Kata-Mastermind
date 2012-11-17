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

	/**
	* @dataProvider not_perfect_guesses
	*/
	public function test_ifScoreIsntPerfectBreakerDoesntYay(
		$aNotPerfectGuess
	) {
		$this->aCodeBreaker->score($aNotPerfectGuess);
		$this->assertNotEquals(
			"Yay! I win!",
			$this->aCodeBreaker->guess()
		);
	}

	public static function not_perfect_guesses(
	) {
		return array(
			array('-'),
			array('+'),
			array('++'),
			array('+++'),
			array('---+'),
			array('--+'),
			array('-+'),
			array('-++-'),
			array('-++'),
			array('-+++'),
		);
	}

	public function test_ifScoreIsntPerfectNewGuessIsDifferentFromAllPreviousOnes(
	) {
		$firstGuess = $this->aCodeBreaker->guess();
		$this->aCodeBreaker->score('+');
		$secondGuess = $this->aCodeBreaker->guess();
		$this->aCodeBreaker->score('+');
		$thirdGuess = $this->aCodeBreaker->guess();

		$this->assertNotEquals($firstGuess, $secondGuess);
		$this->assertNotEquals($firstGuess, $thirdGuess);
		$this->assertNotEquals($secondGuess, $thirdGuess);
	}

	public function test_guessesAreValid(
	) {
		for ($i = 0; $i < 10; $i++) {
			$this->assertValidGuess(
				$this->aCodeBreaker->guess()
			);
		}
	}

	private function assertValidGuess(
		$guess
	) {
		$this->assertEquals(4, strlen($guess));
		$this->assertValidChar($guess[0]);
		$this->assertValidChar($guess[1]);
		$this->assertValidChar($guess[2]);
		$this->assertValidChar($guess[3]);
	}

	private function assertValidChar(
		$char
	) {
		$this->assertTrue($char >= 'A');
		$this->assertTrue($char <= 'F');
	}

}
