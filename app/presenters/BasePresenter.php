<?php

namespace App;

use Nette,
	Model;


/**
 * Base presenter for all application presenters.
 *
 * @property-read RepositoryContainer $orm
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{

	/**
	 * Returns RepositoryContainer.
	 *
	 * @author Jan Tvrdík
	 * @return RepositoryContainer
	 */
	public function getOrm()
	{
		return $this->context->getService('repositoryContainer');
	}

}
