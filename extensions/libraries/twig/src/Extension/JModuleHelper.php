<?php
/**
 * @package     Phproberto.Joomla-Twig
 * @subpackage  Extension
 *
 * @copyright  Copyright (C) 2017-2018 Roberto Segura López, Inc. All rights reserved.
 * @license    See COPYING.txt
 */

namespace Phproberto\Joomla\Twig\Extension;

defined('_JEXEC') || die;

use Joomla\CMS\Document\Renderer\Html\ModuleRenderer;
use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Module helper access for Twig.
 *
 * @since  __DEPLOY_VERSION__
 */
final class JModuleHelper extends AbstractExtension
{
	/**
	 * Inject functions.
	 *
	 * @return  array
	 */
	public function getFunctions() : array
	{
		return [
			new TwigFunction('jmodule_get_module', [ModuleHelper::class, 'getModule']),
			new TwigFunction('jmodule_get_modules', [ModuleHelper::class, 'getModules']),
			new TwigFunction('jmodule_render_module', [ModuleHelper::class, 'renderModule'], ['is_safe' => ['html']]),
			new TwigFunction('jmodule_module_cache', [ModuleHelper::class, 'moduleCache'])
		];
	}

	/**
	 * Get the name of this extension.
	 *
	 * @return  string
	 */
	public function getName() : string
	{
		return 'jmodule';
	}
}
