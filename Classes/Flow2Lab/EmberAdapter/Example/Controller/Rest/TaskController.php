<?php
namespace Flow2Lab\EmberAdapter\Example\Controller\Rest;

use TYPO3\Flow\Annotations as Flow;

use Flow2Lab\EmberAdapter\Example\Domain\Model\Task;

/**
 * The Member module controller
 *
 * @Flow\Scope("singleton")
 */
class TaskController extends \Flow2Lab\EmberAdapter\Controller\AbstractEndpointController {

	/**
	 * @var string
	 */
	protected $modelName = 'Flow2Lab\\EmberAdapter\\Example\\Domain\\Model\\Task';

	/**
	 * @var string
	 */
	protected $resourceArgumentName = 'task';

	/**
	 * @Flow\Inject
	 * @var \Flow2Lab\EmberAdapter\Example\Domain\Repository\TaskRepository
	 */
	protected $taskRepository;

	/**
	 * Get All Tasks
	 */
	public function listAction() {
		$this->view->assign('tasks', $this->taskRepository->findAll());
	}

	/**
	 * @param Task $task
	 */
	public function showAction(Task $task) {
		$this->view->assign('task', $task);
	}

	/**
	 * @param Task $task
	 * @Flow\SkipCsrfProtection
	 */
	public function createAction(Task $task) {
		$this->taskRepository->add($task);
		$this->response->setStatus(201);
		$this->view->assign('task', $task);
	}

	/**
	 * @param Task $task
	 * @Flow\SkipCsrfProtection
	 */
	public function updateAction(Task $task) {
		$this->taskRepository->update($task);
		$this->view->assign('task', $task);
	}

	/**
	 * @param Task $task
	 * @Flow\SkipCsrfProtection
	 * @return string
	 */
	public function deleteAction(Task $task) {
		$this->taskRepository->remove($task);
		$this->response->setStatus(204);
		return '';
	}
}