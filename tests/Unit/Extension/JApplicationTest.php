<?php
/**
 * @package     Phproberto.Joomla-Twig
 * @subpackage  Tests.Unit
 *
 * @copyright  Copyright (C) 2017 Roberto Segura López, Inc. All rights reserved.
 * @license    See COPYING.txt
 */

namespace Phproberto\Joomla\Twig\Test\Unit\Extension;

use Joomla\CMS\Application\CMSApplication;
use Phproberto\Joomla\Twig\Extension\JApplication;

/**
 * JApplication extension test.
 *
 * @since   __DEPLOY_VERSION__
 */
class JApplicationTest extends \TestCaseDatabase
{
	private $extension;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @return  void
	 */
	protected function setUp()
	{
		parent::setUp();
		$this->saveFactoryState();
		\JFactory::$session     = $this->getMockSession();
		\JFactory::$config      = $this->getMockConfig();
		\JFactory::$application = $this->getMockCmsApp();

		$this->extension = new JApplication;
	}


	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 *
	 * @return  void
	 */
	protected function tearDown()
	{
		$this->restoreFactoryState();
		parent::tearDown();
	}

	/**
	 * Test getFunctions returns correct data.
	 *
	 * @return  void
	 */
	public function testGetFunctionsReturnsCorrectData()
	{
		$this->assertEquals(1, count($this->extension->getFunctions()));

		$function = $this->extension->getFunctions()[0];

		$callable = $function->getCallable();
		$this->assertTrue(is_callable($callable));
		$this->assertEquals('japp', $function->getName());
		$this->assertEquals(CMSApplication::class, $callable[0]);
		$this->assertEquals('getInstance', $callable[1]);
	}

	/**
	 * getName returns japp.
	 *
	 * @return  void
	 */
	public function testGetNameReturnsJapp()
	{
		$this->assertEquals('japp', $this->extension->getName());
	}
}
