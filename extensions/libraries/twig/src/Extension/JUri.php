<?php
/**
 * @package     Phproberto.Joomla-Twig
 * @subpackage  Extension
 *
 * @copyright  Copyright (C) 2017 Roberto Segura López, Inc. All rights reserved.
 * @license    See COPYING.txt
 */

namespace Phproberto\Joomla\Twig\Extension;

defined('_JEXEC') or die;

use Twig\TwigFunction;
use Joomla\CMS\Uri\Uri;
use Twig\Extension\AbstractExtension;

/**
 * JUri integration for Twig.
 *
 * @since  1.0.0
 */
class JUri extends AbstractExtension
{
	/**
	 * Inject functions.
	 *
	 * @return  array
	 */
	public function getFunctions()
	{
		return [
			new TwigFunction('juri', [Uri::class, 'getInstance'])
		];
	}

	/**
	 * Get the name of this extension.
	 *
	 * @return  string
	 */
	public function getName()
	{
		return 'juri';
	}
}
