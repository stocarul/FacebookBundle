<?php

namespace Stocarul\FacebookBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Stocarul\FacebookBundle\DependencyInjection\StocarulFacebookExtension;

class StocarulFacebookExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * testLoadThrowsExceptionIfEmpty
     *
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testLoadThrowsExceptionIfEmpty()
    {
        $container = $this->getContainerBuilder();
        $extension = $this->getExtension();
        $extension->load(array(), $container);
    }

    /**
     * testLoadThrowsExceptionIfOauthEmpty
     *
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testLoadThrowsExceptionIfOauthEmpty()
    {
        $configs = array(
            'stocarul_facebook' => array(
                'oauth' => array(
                ),
            ),
        );

        $container = $this->getContainerBuilder();
        $extension = $this->getExtension();
        $extension->load($configs, $container);
    }

    /**
     * testLoadThrowsExceptionIfAppIdNotSet
     *
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testLoadThrowsExceptionIfAppKeIdNotSet()
    {
        $configs = array(
            'stocarul_facebook' => array(
                'oauth' => array(
                    'app_secret' => 'test_app_secret',
                ),
            ),
        );

        $container = $this->getContainerBuilder();
        $extension = $this->getExtension();
        $extension->load($configs, $container);
    }

    /**
     * testLoadThrowsExceptionIfAppSecretNotSet
     *
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testLoadThrowsExceptionIfAppSecretNotSet()
    {
        $configs = array(
            'stocarul_facebook' => array(
                'oauth' => array(
                    'app_id' => 'test_app_id',
                ),
            ),
        );

        $container = $this->getContainerBuilder();
        $extension = $this->getExtension();
        $extension->load($configs, $container);
    }

    /**
     * testLoadPassWithoutToken
     *
     */
    public function testLoadPassWithoutToken()
    {
        $configs = array(
            'stocarul_facebook' => array(
                'oauth' => array(
                    'app_id'     => 'test_app_id',
                    'app_secret' => 'test_app_secret',
                ),
            ),
        );

        $container = $this->getContainerBuilder();
        $extension = $this->getExtension();

        $extension->load($configs, $container);

        $this->assertTrue(
            $container->hasParameter('stocarul_facebook.oauth.app_id'),
            'The stocarul_facebook.oauth.app_id parameter is missing'
        );
        $this->assertEquals(
            'test_app_id',
            $container->getParameter('stocarul_facebook.oauth.app_id')
        );

        $this->assertTrue(
            $container->hasParameter('stocarul_facebook.oauth.app_secret'),
            'The stocarul_facebook.oauth.app_secret parameter is missing'
        );
        $this->assertEquals(
            'test_app_secret',
            $container->getParameter('stocarul_facebook.oauth.app_secret')
        );

        $this->assertTrue(
            $container->hasParameter('stocarul_facebook.oauth.app_token'),
            'The stocarul_facebook.oauth.app_token parameter is missing'
        );
        $this->assertEquals(
            null,
            $container->getParameter('stocarul_facebook.oauth.app_token')
        );
    }

    /**
     * testLoadPassWithToken
     *
     */
    public function testLoadPassWithToken()
    {
        $configs = array(
            'stocarul_facebook' => array(
                'oauth' => array(
                    'app_id'     => 'test_app_id',
                    'app_secret' => 'test_app_secret',
                    'app_token'  => 'test_app_token',
                ),
            ),
        );

        $container = $this->getContainerBuilder();
        $extension = $this->getExtension();

        $extension->load($configs, $container);

        $this->assertTrue(
            $container->hasParameter('stocarul_facebook.oauth.app_id'),
            'The stocarul_facebook.oauth.app_id parameter is missing'
        );
        $this->assertEquals(
            'test_app_id',
            $container->getParameter('stocarul_facebook.oauth.app_id')
        );

        $this->assertTrue(
            $container->hasParameter('stocarul_facebook.oauth.app_secret'),
            'The stocarul_facebook.oauth.app_secret parameter is missing'
        );
        $this->assertEquals(
            'test_app_secret',
            $container->getParameter('stocarul_facebook.oauth.app_secret')
        );

        $this->assertTrue(
            $container->hasParameter('stocarul_facebook.oauth.app_token'),
            'The stocarul_facebook.oauth.app_token parameter is missing'
        );
        $this->assertEquals(
            'test_app_token',
            $container->getParameter('stocarul_facebook.oauth.app_token')
        );
    }

    /**
     * getContainerBuilder
     *
     * @return ContainerBuilder
     */
    protected function getContainerBuilder()
    {
        return new ContainerBuilder();
    }

    /**
     * getExtension
     *
     * @return StocarulFacebookExtension
     */
    protected function getExtension()
    {
        return new StocarulFacebookExtension();
    }
}
