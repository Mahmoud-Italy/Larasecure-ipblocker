# IP Blocker
A Laravel Package to increase the security of your websites by preventing access for users having blocked IP Addresses.

However, you can add IP Addresses as many as you want into table called ipblockers which you want to disallow access to your site from spam etc.

# Installation
composer require LaraSecure/ip-blocker

# Then publish the config
<pre>php artisan vendor:publish --tag=ipblocker</pre>
<pre>php artisan migrate</pre>


# Usage
Add this middlewar in Kernel.php $routeMiddleware to restrict IP Addresses

<pre>'IPBlocking' => \LaraSecure\IPBlocker\Middlewares\IPBlocking::class</pre>


Add IPBlocking middleware toroute group for which you want to restrict access.

Users will be redirect to "403 | Forbidden" page if their IP exist on ipblockers table.





# Security
If you discover any security related issues, please email mahmoud.italy@outlook.com instead of using the issue tracker.

# Credits

  <ul>
    <li><a href="https://github.com/Mahmoud-Italy">Mahmoud Italy</a></li>
    <li><a href="https://github.com/Mahmoud-Italy/Larafast-fastApi/graphs/contributors">All Contributors</a></li>
  </ul>

# License
The MIT License (MIT). Please see License File for more information.