FacebookBundle
==============

[![Build Status](https://travis-ci.org/stocarul/FacebookBundle.svg?branch=master)](https://travis-ci.org/stocarul/FacebookBundle)

## Installation

#### A) Add Stocarul Facebook Bundle to your composer.json

```yaml
{
    "require": {
        "stocarul/facebook-bundle": "dev-master"
    }
}
```

#### B) Enable the bundle

```php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Stocarul\FacebookBundle\StocarulFacebookBundle(),
    );
}
```

#### C) Configure the bundle

```yaml
// app/config/config.yml

stocarul_facebook:
    oauth:
        app_id:       your_app_id
        app_secret:   your_app_secret
```
