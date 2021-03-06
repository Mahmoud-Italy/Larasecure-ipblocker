# IP Blocker
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Mahmoud-Italy/LaraSecure-IPBlocker/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Mahmoud-Italy/LaraSecure-IPBlocker/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/Mahmoud-Italy/LaraSecure-IPBlocker/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
<a href="https://packagist.org/packages/larasecure/ip-blocker"><img src="https://poser.pugx.org/larasecure/ip-blocker/d/total.svg" alt="Total Downloads"></a>

![ib-blocker](ip-blocker.jpg)

A Laravel Package to increase the security of your websites by preventing access for users having blocked IP Addresses.

However, you can add IP Addresses as many as you want into table called ipblockers which you want to disallow access to your site from spam etc.

# Installation
<pre>composer require larasecure/ip-blocker</pre>

# Then publish the config
<pre>php artisan vendor:publish --tag=ipblocker</pre>
<pre>php artisan migrate</pre>


# Usage
Add this middleware in Kernel.php $routeMiddleware to restrict IP Addresses

<pre>'IPBlocking' => \Larasecure\IPBlocker\Middlewares\IPBlocking::class</pre>

Add IPBlocking middleware to route group for which you want to restrict access.
<pre>
  Route::group(['middleware' => 'IPBlocking'], function(){
    // you routes..
  });
</pre>
or you can injected in RouteServiceProvider.php
<pre>
  protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware(['api', 'IPBlocking'])
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
</pre>

or just add middleware to single route
<pre>
  Route::get('/', function () {
    //
  })->middleware('IPBlocking');
</pre>
<br/>
<b>Users will be redirect to "403 | Forbidden" page if their IP exist on ipblockers table.</b>

# Credits

  <ul>
    <li><a href="https://github.com/Mahmoud-Italy">Mahmoud Italy</a></li>
    <li><a href="https://github.com/Mahmoud-Italy/Larasecure-ipblocker/graphs/contributors">All Contributors</a></li>
  </ul>

# License
The MIT License (MIT). Please see License File for more information.