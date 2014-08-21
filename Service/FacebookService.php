<?php

namespace Stocarul\FacebookBundle\Service;

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;

/**
 * Class: FacebookService
 *
 */
class FacebookService
{
    /**
     * facebookSession
     *
     * @var FacebookSession
     */
    protected $facebookSession;

    /**
     * Constructor
     *
     * @param string $appId
     * @param string $appSecret
     */
    public function __construct($appId, $appSecret)
    {
        FacebookSession::setDefaultApplication($appId, $appSecret);
    }

    /**
     * Set facebookSession
     *
     * @param FacebookSession $facebookSession
     */
    public function setAccessToken($accessToken)
    {
        $this->facebookSession = new FacebookSession($accessToken);
    }

    /**
     * Makes the request to Facebook and returns the restul
     *
     * @param string      $method
     * @param string      $path
     * @param array|null  $parameters
     * @param string|null $version
     *
     * @return FacebookResponse
     *
     * @throws FacebookSDKException
     * @throws FacebookRequestException
     */
    public function makeRequest($method, $path, $parameters = null, $version = null)
    {
        $request = new FacebookRequest(
            $this->facebookSession,
            $method,
            $path,
            $parameters,
            $version
        );

        return $request->execute();
    }
}
