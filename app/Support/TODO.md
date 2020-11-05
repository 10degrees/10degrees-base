# TODO

Here's a list of stuff to sort out. In no particular order, they range from
"must do ASAP" to "would be nice but might be overill".

This project started out as adding wp-cli wrapper for simple command line
interface. It very quickly expanded into refactoring almost everything to
utilize auto-loading, and more abstraction to make development quicker and
simpler.

I foresee this turning into a WP compatible laravel-esque implementation so we
can use nice fluent APIs whilst still utilizing WP built in functionality. An
example of this is the mailer class. It uses a nice API but runs `wp_mail` under
the hood for maximum WP compatability.

-   more comprehensive `Request` object
-   `Response` object to be returned from controllers
-   `CustomPostType` abstract class
-   doc-block evey class/function
-   add helpers/namespace helpers/remove duplicate "view" helpers
-   remove helpers glob loading
-   fix `Mailer` class to allow for collections/arrays of emails
-   implement queues as composer package doesn't work with other packages
-   Use Illuminate packages e.g. Collection/Str/Arr
-   update composer to require all packages used - don't rely on it existing
-   add PHP version to composer
-   Container
-   Application (Kernel/bootstrapper like L@\*%v3l)
-   Facades
-   Auth facade e.g. `Auth::user()`
-   blade templates
-   move all templates to templates/resources folder to keep root tidy
-   routes file e.g.
    `Ajax::listen('action_name', \App\Http\Controllers\AjaxController::class)`
    `Route::get('route', \App\Http\Controllers\RestController::class)`
