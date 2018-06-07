<?php
/**
 * @package     Phproberto.Joomla-Twig
 * @subpackage  Plugin.Jroute
 *
 * @copyright  Copyright (C) 2017-2018 Roberto Segura López, Inc. All rights reserved.
 * @license    See COPYING.txt
 */

defined('_JEXEC') || die;

JLoader::import('twig.library');

use Phproberto\Joomla\Twig\Extension\JRoute;
use Phproberto\Joomla\Twig\Plugin\BasePlugin;
use Twig\Environment;

/**
 * Plugin to integrate jroute extension with twig.
 *
 * @since  1.0.0
 */
class PlgTwigJroute extends BasePlugin
{
	/**
	 * Triggered after environment has been loaded.
	 *
	 * @param   Environment  $environment  Loaded environment
	 * @param   array        $params       Optional parameters
	 *
	 * @return  void
	 */
	public function onTwigAfterLoad(Environment $environment, $params = [])
	{
		$environment->addExtension(new JRoute);
	}
}
