<?php
namespace Flow2Lab\EmberAdapter\Example\Domain\Model;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * A simple todo.
 *
 * @Flow\Entity
 */
class Task {

	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var boolean
	 */
	protected $isComplete = FALSE;

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @return boolean
	 */
	public function isIsComplete() {
		return $this->isComplete;
	}

	/**
	 * @param boolean $isComplete
	 */
	public function setIsComplete($isComplete) {
		$this->isComplete = $isComplete;
	}
}