<?php
namespace Flowpack\EmberAdapter\Example\Controller;

use TYPO3\Flow\Mvc\Controller\ActionController;
use TYPO3\Flow\Annotations as Flow;

class FrontendController extends ActionController {

	/**
	 * @var \TYPO3\Flow\Package\PackageManagerInterface
	 * @Flow\Inject
	 */
	protected $packageManager;

	/**
	 * Index Page of Example App
	 */
	public function indexAction() {
		$this->view->assign('templatejs', $this->getTemplatesJs());
	}

	/**
	 * Generates js for template compiling
	 * @return string
	 */
	protected function getTemplatesJs() {
		$resourcesPath = $this->packageManager->getPackageOfObject($this)->getResourcesPath();
		$templates = \TYPO3\Flow\Utility\Files::readDirectoryRecursively($resourcesPath . 'Private/Templates/Handlebars', '.hbs');

		$content = '';
		foreach($templates as $templatePath) {
			$templateName = str_replace('_', '/', basename($templatePath, '.hbs'));
			$data = str_replace(array("\n\r", "\n", "\r"), array(" ", " ", " "), \TYPO3\Flow\Utility\Files::getFileContents($templatePath));
			$content .= "Ember.TEMPLATES['" . $templateName . "'] = Ember.Handlebars.compile('" . $data . "');\n";
		}

		return $content;
	}

}