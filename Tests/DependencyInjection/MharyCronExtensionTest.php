<?php
/**
 *
 * @link http://www.superreal.de
 * @copyright (C) superReal GmbH | Agentur fuer Neue Kommunikation
 * @author Sebastian Kueck <s.kueck AT superreal.de>
 */

namespace Mhary\Bundle\CronBundle\Tests;


use Mhary\Bundle\CronBundle\DependencyInjection\MharyCronExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class MharyCronExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testExtension()
    {
        $loader = new MharyCronExtension();
        $config = array();
        $loader->load(array($config), new ContainerBuilder());
    }

    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testInvalidConfigException()
    {
        $loader = new MharyCronExtension();
        $config = array('foo'=>'bar');
        $loader->load(array($config), new ContainerBuilder());
    }

    public function testConfiguration()
    {
        $loader = new MharyCronExtension();
        $config = array(
            'tasks' => array(
                'testtask' => array(
                    'bin' => 'php',
                    'script' => '',
                    'command' => '-i',
                    'expression' => '* * * * *'
                )
            )
        );
        $loader->load(array($config), new ContainerBuilder());

    }
}
 