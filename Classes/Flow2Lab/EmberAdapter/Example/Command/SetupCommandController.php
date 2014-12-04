<?php
namespace Flow2Lab\EmberAdapter\Example\Command;

use Flow2Lab\EmberAdapter\Example\Domain\Model\Task;
use Flow2Lab\EmberAdapter\Example\Domain\Repository\TaskRepository;

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Cli\CommandController;

/**
 * Class SetupCommandController
 *
 * @package Flow2Lab\EmberAdapter\Example\Command
 */
class SetupCommandController extends CommandController {

	/**
	 * @Flow\Inject
	 * @var TaskRepository
	 */
	protected $taskRepository;

	/**
	 * @param string $title
	 */
	public function createTaskCommand($title) {
		$task = new Task();
		$task->setTitle($title);
		$task->setIsComplete(FALSE);

		$this->taskRepository->add($task);
	}
}