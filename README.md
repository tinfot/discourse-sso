# Discourse SSO for Laravel 5


---

[![License](https://poser.pugx.org/maatwebsite/excel/license.png)](https://packagist.org/packages/tinfot/discourse-sso)

# Installation
Require this package in your composer.json and update composer. 

```php
composer require tinfot/discourse-sso:dev-master
```

# Usage

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tinfot\Discourse\Payload;
use Tinfot\Discourse\User;
use Tinfot\Discourse\Sso;

class DiscourseController extends Controller {
    
    public function sso(Request $request) {
        $payload = new Payload(config('discourse.secret'));
        if (!$payload->validate($request->input('sso'), $request->input('sig'))) {
            abort(404);
        }

        $auth = $request->user();

        $nonce = $payload->decode($request->input('sso'));
        $sso   = new Sso($nonce, config('discourse.secret'));
        $sso->setParameters(new User($auth->id, $auth->email, $auth->name));
        $data = $sso->build($payload);
        return redirect(config('discourse.discourse_url') . $data);
    }
}
```

# Support
Support only through Github. Please don't mail us about issues, make a Github issue instead.