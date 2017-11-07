<?php
/**
 * @package     Phproberto.Joomla-Twig
 * @subpackage  Extension
 *
 * @copyright  Copyright (C) 2017 Roberto Segura López, Inc. All rights reserved.
 * @license    See COPYING.txt
 */

namespace Phproberto\Joomla\Twig\Extension;

defined('_JEXEC') || die;

use Joomla\CMS\Document\Document;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * JDocument integration for Twig.
 *
 * @since  1.0.0
 */
final class JDocument extends AbstractExtension
{
	/**
	 * Inject functions.
	 *
	 * @return  array
	 */
	public function getFunctions()
	{
		return [
			new TwigFunction('jdoc', [Document::class, 'getInstance'])
		];
	}

	/**
	 * Get the name of this extension.
	 *
	 * @return  string
	 */
	public function getName()
	{
		return 'jdoc';
	}
}
