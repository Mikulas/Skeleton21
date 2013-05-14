<?php

namespace Clevispace;

use Nette\Application;


/**
 * Všechny presentery sídlí v namespace aplikace
 *
 * @author Jan Tvrdík
 */
class PresenterFactory extends Application\PresenterFactory
{

	/** @var string */
	private $namespace;


	/**
	 * Sets application namespace
	 *
	 * @author Vojtěch Dobeš
	 * @param  string
	 * @return PresenterFactory provides a fluent interface
	 */
	public function setNamespace($namespace)
	{
		$this->namespace = (string) $namespace;
		return $this;
	}

	/**
	 * Formats presenter class name from its name.
	 *
	 * @author Jan Tvrdík
	 * @param  string
	 * @return string
	 */
	public function formatPresenterClass($presenter)
	{
		if (substr_compare($presenter, 'Nette:', 0, 6) === 0)
		{
			return parent::formatPresenterClass($presenter);
		}

		return $this->namespace . '\\' . str_replace(':', '\\', $presenter) . 'Presenter';
	}

	/**
	 * Formats presenter name from class name.
	 *
	 * @author Jan Tvrdík
	 * @param  string
	 * @return string
	 */
	public function unformatPresenterClass($class)
	{
		if (substr_compare($class, $this->namespace . '\\', 0, strlen($this->namespace) + 1) !== 0)
		{
			return parent::unformatPresenterClass($class);
		}

		return str_replace('\\', ':', substr($class, strlen($this->namespace) + 1, -9));
	}

}
