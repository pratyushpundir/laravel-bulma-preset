### Bulma Frontend Preset For Laravel

This preset switches out [Bootstrap](https://getbootstrap.com/) with the awesome [Bulma](https://bulma.io/). In it's own words:
 > Bulma is a free, open source CSS framework based on Flexbox and used by more than 100,000 developers.
 
### What it does
 - Removes ````bootstrap```` in favor of ````bulma````.
 - Other NPM packages removed: ```lodash```, ````jquery````, ````popper.js````.
 - Adds a Bulma based Blade layout: ````resources/views/bulma/layouts/app.blade.php````.
 - Adds a Bulma based Blade view: ````resources/views/bulma/welcome.blade.php````.
 - Adds a Bulma based "Navbar" Blade component: ````resources/views/bulma/shared/bulma-nav.blade.php````.
 - Adds versioning / cache-busting of CSS and JS assets for production environments in your ````webpack.mix.js````.
 
 
### Installation
 This preset's Blade views are kept in it's own directory so nothing should go wrong on that front, but, for a non-fresh project, it ***will 100%*** squash any custom JS, SASS, Mix code you may have written). ___You have been warned!___
 
 - ````cd```` into your ***fresh*** Laravel project.
 - Run ````composer require pratyushpundir/bulma-preset````.
 - Then run `````php artisan preset bulma`````. This will scaffold everything you need to replace Bootstrap with Bulma and set up your JS, SASS and Blade Views.
 - Install and compile your assets with ````yarn && yarn watch```` or ````npm install && npm run watch```` (but ```yarn``` is so much better!!!).
 - Visit ````routes/web.php```` and change the following piece of code:
 
 ````php
 Route::get('/', function () {
     // Change this...
     return view('welcome');
 });
 ````
 
 to
 
 ````php
 Route::get('/', function () {
     // To this!
     return view('bulma.welcome');
 });
 ````
That's it!. Run ````php artisan serve```` and visit ```http://localhost:8000``` for a brand new, Bulma-based, Welcome page! 

### Extras
#### Asset versioning / cache-busting in Production
You need to ensure 2 things happen for this to work:
 1. SASS and JS assets need to be compiled using the the ````production```` settings. To do this, run ````yarn production```` or ````yarn prod````. You can use NPM too of course. But we talked about this! 
 2. Your Laravel app needs to be in ````production```` environment. Do this in your ````.env```` file.

#### Enable the Version Number Badge in````bulma-nav.blade.php````
 1. Add ````'version' => env('APP_VERSION', '1.0.0'),```` to your ```config/app.php``` file.
 2. Add ````APP_VERSION=YOUR_VERSION_NUMBER```` to your ````.env```` file. Replace "YOUR_VERSION_NUMBER" with whatever you need.


### Author
Pratyush Pundir   
Email: pratyushpundir@icloud.com
