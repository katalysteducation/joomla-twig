<?php
/**
 * @package     Phproberto.Joomla-Twig
 * @subpackage  Twig
 *
 * @copyright  Copyright (C) 2017-2018 Roberto Segura López, Inc. All rights reserved.
 * @license    See COPYING.txt
 */

namespace Phproberto\Joomla\Twig\View;

defined('_JEXEC') || die;

use Joomla\CMS\Application\ApplicationHelper;
use Joomla\CMS\MVC\View\HtmlView as BaseView;
use Phproberto\Joomla\Twig\Traits\HasLayoutData;
use Phproberto\Joomla\Twig\View\Traits\HasTwigRenderer;

/**
 * Base HTML view.
 *
 * @since  __DEPLOY_VERSION__
 */
abstract class HtmlView extends BaseView
{
	use HasLayoutData, HasTwigRenderer;

	/**
	 * Load layout data.
	 *
	 * @return  array
	 */
	protected function loadLayoutData()
	{
		return [
			'view' => $this
		];
	}
}
