<?php
/**
 * @package     Phproberto.Joomla-Twig
 * @subpackage  Loader
 *
 * @copyright  Copyright (C) 2017 Roberto Segura López, Inc. All rights reserved.
 * @license    See COPYING.txt
 */

namespace Phproberto\Joomla\Twig\Loader;

defined('_JEXEC') || die;

use Joomla\CMS\Factory;

/**
 * Joomla extension file system loader.
 *
 * @since  1.0.0
 */
abstract class ExtensionLoader extends \Twig_Loader_Filesystem
{
	/**
	 * Namespace applicable to this extension.
	 *
	 * @var  string
	 */
	protected $extensionNamespace;

	/**
	 * Constructor.
	 *
	 * @param   string|array  $paths  A path or an array of paths where to look for templates
	 */
	public function __construct($paths = [])
	{
		$this->setPaths($this->getTemplatePaths(), $this->extensionNamespace);

		parent::__construct($paths);
	}

	/**
	 * Get the base path for the active application.
	 *
	 * @return  string
	 */
	protected function getBaseAppPath()
	{
		if (Factory::getApplication()->isAdmin())
		{
			return JPATH_ADMINISTRATOR;
		}

		return JPATH_SITE;
	}

	/**
	 * Get the paths to search for templates.
	 *
	 * @return  array
	 */
	abstract protected function getTemplatePaths();

	/**
	 * Find a template.
	 *
	 * @param   string  $name   Name of the template to search
	 * @param   bool    $throw  Whether to throw an exception when an error occurs
	 *
	 * @return  mixed
	 *
	 * @throws  \Twig_Error_Loader
	 */
	protected function findTemplate($name, $throw = true)
	{
		if (!$this->nameInExtensionNamespace($name))
		{
			return false;
		}

		$result = false;

		try
		{
			$result = parent::findTemplate($name);
		}
		catch (\Exception $e)
		{
			$result = false;
		}

		if ($result)
		{
			return $result;
		}

		$parsedName = $this->parseExtensionName($name);

		if ($parsedName === $name)
		{
			throw $e;
		}

		return parent::findTemplate($parsedName);
	}

	/**
	 * Check if a layout name is in current namespace.
	 *
	 * @param   string  $name  Name of the current layout
	 *
	 * @return  boolean
	 */
	protected function nameInExtensionNamespace($name)
	{
		$nameParts = explode('/', $name);

		return isset($nameParts[0]) && $nameParts[0] === '@' . $this->extensionNamespace;
	}

	/**
	 * Parse a received extension name.
	 *
	 * @param   string  $name  Name of the template to search
	 *
	 * @return  string
	 */
	protected function parseExtensionName($name)
	{
		return $name;
	}
}
