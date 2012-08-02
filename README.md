# ECTA Framework

## Overview

This framework is used by the Education and Collaboration Technology Group's 
Architecture Team (ECTA) for rapid, object-oriented PHP development. It includes
a number of PHP libraries, as well as the WebBlocks responsive framework, and
can serve as a baseline to fork from when developing applications within ECTA.

## Installation

### Requirements

The ECTA Framework has the following requirements:

* PHP 5.3 or above
* Node.js (with NPM)
* Ruby (with Bundler)

The PHP requirement stems from the implementation of some libraries, namely
through the use of late static binding and namespaces. The latter pair, meanwhile,
stem from WebBlocks, a submodule leveraged by this framework. They are not
necessary if one plans simply to use the WebBlocks source compiled as is, but
they are highly recommended within the ECTA workflow given the power of SASS.

### Installation

The `global.php` file must be configured for the framework to work correctly.

A few required attributes:

* `url` - Required in order for the `URL` library to determine accurate pathing.
This URL should point to your /www directory.
* `db_*` - Required by `DB` and `Active_Record_Model` in order to connect to
a MySQL database.

Once this is done, the framework should run correctly. It is configured from
the start to include the WebBlocks suite (Twitter Bootstrap, jQuery, Modernizr,
etc.), although one may remove this functionality by stripping out the respective
`link` and `script` tags in `view/template/default.php`.

One may also start immediately applying their own Javascript and CSS by placing
it within `/www/assets` in some folder ''besides'' `/www/assets/blocks`. The
`/www/assets/blocks` directory should not be modified directly, as invoking a
WebBlocks build will overwrite this directory completely.

Going further than simply defining additional CSS, one may incorporate style
definitions directly into the WebBlocks build (with SASS and Compass) by editing
the files in `/src/sass`, namely `site.scss` for all visitors and `site-ie.scss`
for visitors using Internet Explorer 8 and below. In order for definitions
within `/src/sass` to be applied to the application, one must run the WebBlocks
build script by invoking the command `rake` from the root directory of the ECTA
framework.

The Rakefile included is set up to invoke the WebBlocks build process, use the
`/src/sass` directory as the base directory for style definitions, and use the
`/www/assets/blocks` directory as the output directory of the fully built
assets.

The WebBlocks workflow for style definitions is highly recommended over simply
defining additional stylesheets. For more information, see WebBlocks project
information: https://github.com/ucla/WebBlocks

### Forking ECTA

It is recommended that all projects using the framework are forked directly
from the ECTA repository itself. A simple way to do this with Git from your
workstation is as follows:

```
mkdir your-app
cd your-app
git init
git remote add origin git@github.com:ucla/your-app.git # change "your-app" to repository name
git remote add upstream git@github.com:ucla/ecta.git
git pull upstream master
git push -u origin master
```

This will pull down the current version of the ECTA framework from its repository
and then push it up to your repository. Once this is done, then you can start
working on your own repository. Changes should never be committed back to
the ecta (upstream) repository, but rather only your app's repository (origin).

In the event that you seek to later update the framework, you can do this as:

```
git pull upstream master
```

This will pull down the latest version of the framework from the ECTA repository.

In most cases, you should not have merge conflicts, because the ECTA framework
is set up with a clear separation of framework files and application files. 
However, for this reason, it is generally recommended you do not modify the 
framework files themselves.

### System Administration

When deploying this to a production server, it is recommended that the document
root is set to the `/www` directory of the application. A `.htaccess` file
prevents display of the other directories.

## Features

### Class Autoloader

The ECTA Framework includes an autoloader, meaning that one does not need to use
`require()` or `include()` for class definitions. Instead, the framework
automatically loads these files, so long as they are placed in the proper 
directory and with the proper name.

The autoloader observes the following naming conventions are used:

* Controllers: Any class that ends in `_Controller` is loaded from the `/controller` directory.
* Models: Any class that ends in `_Model` is loaded from the `/model` directory.
* Exceptions: Any class that ends in `_Exception` is loaded from the `/exception` directory.
* Interfaces: Any class that ends in `_Interface` is loaded from the `/interface` directory.
* Unit Tests: Any class that ends in `_Test` is loaded from the `/test` directory.
* Libraries: All other objects are loaded from the `/lib` directory.

Further, all files containing definitions should bear a lower-case version of 
the name of the class they contain. A few examples:

* `Home_Controller` -> `controller/home_controller.php`
* `Active_Record_Model` -> `model/active_record_model.php`
* `DB_Exception` -> `exception/db_exception.php`
* `Template` -> `lib/template.php`

These conventions exist to facilitate a clear separation of responsibility among
different objects that make up the system and make it easy to locate the
definition file for any given object.

Further, the autoloader supports the use of PHP namespaces (PHP 5.3 and above), 
whereby a namespace represents a subdirectory within the proper top-level 
directory. ECTA generally recommends against PHP namespaces, but
in some large projects, they may prove necessary.

### Model-View-Controller

The ECTA Framework can be invoked directly by any script simply by including
`global.php`. However, ECTA vastly prefers the MVC paradigm to the use of 
multiple script files.

The Model-View-Controller paradigm exists to separate data models, business
logic and presentational layers. For a general overview of MVC, please see
http://en.wikipedia.org/wiki/Model–view–controller.

Within ECTA, the following conventions are generally followed:

* Models handle all interaction with persistence layers such as databases and
web services. In the case of database interactions, one should usually extend
the `Active_Record_Model` to simplify interaction.
* Controllers accept user input, construct models to perform operations based on
the data and then assemble views to display the data out to end users.
* Views represent user interface elements that are rendered out to the end user.
All HTML should be encapsulated within views, and in most cases, views should 
not use any PHP code more sophisticated than outputting data from objects and 
looping through sets of objects.

The `Router` object is responsible for constructing the controller and invoking
the right method on it. In the default implementation found in `www/index.php`,
the router looks at the query string and takes the first parameter (up to the
first ampersand) and uses it as routing as follows:

* `index.php` -> `Home_Controller::Home()`
* `index.php?about` -> `About_Controller::About()`
* `index.php?news/articles` -> `News_Controller::articles()`
* `index.php?news/arcticle/1` -> `News_Controller:article(1)`

It accepts any number of segments in the call string. The first segment is
the controller class (defaults to "home" if not specified). The second segment
is the controller method (defaults to the controller name without "_controller"
if not specified). Finally, all additional segments are passed as arguments to
the controller method when it is invoked.

All controller methods should be defined as instance methods, not static 
methods. This allows one to specify routines in the constructor that are always 
guaranteed to run when the controller is invoked regardless of the method 
called.

### View Object

The `View` object provides an object-oriented way of encapsulating a set of 
mixed HTML/PHP. At the most basic level, one may invoke a view as follows:

```php
$view = new View('foobar');
echo $view->render();
```

In the above example, the file `view/foobar.php` would be loaded and output to
the screen. 

Views provide the ability to set variables that are used within them:

```php
$view = new View('foobar');
$view->foo = 'bar';
echo $view->render();
```

In this example, the file `view/foobar.php` would be loaded, a variable `$foo` 
would be available inside of it set to "bar", and then the view would be output
to the screen as such.

### Output Buffer

The ECTA Framework includes a transparent output buffer for several purposes:

* Required by the `Template` library to wrap all output in a template view.
* Allows a user to clear all outputs at any point during execution.
* Allows a user to invoke functions related to HTTP headers (including `header()` 
and `session_start()`) without worry that output may have already been sent and
thus the HTTP header will no longer be writeable.

Generally, it is not anticipated that a user will ever need to invoke any of
the methods provided by `Output`. However, in the event that there is a need to
clear the buffer, one may invoke the PHP native function `ob_clear()` to erase 
all output from the buffer up to that point and start anew.

### Template Library

The `Template` library takes all output generated by the end user and places it
within a designated location inside of a template file. This allows for a user
to place common elements (like the HTML `head`, the site header and navigation
and the site footer) within a single file and avoid redundancy.

All template views are stored within `/view/template` and the default template
view is `/view/template/default.php`. You can change the template view used by
calling `Template::set_name($name)` and you can get the name of the current
template file by calling `Template::get_name()`. Note that when setting a template,
you provide the name of the template file relative to `/view/template` and you
should not include the `.php` file suffix.

Within a template file, you set the position where all content output by your
script will be placed through the line `<?php echo $CONTENT; ?>`.

The `Template` may also be disabled at any time during execution by invoking
`Template::disable()`, and similarly a `Template::enable()` function also
exists. One may also check if the template is enabled as `Template::is_enabled()`.

In the event that there is a need to pass a variable into the template view
file, you can use `Template::set_var($name, $value)` to do so, and similarly
`Template::get_var($name)` returns the value of the variable as set in the
template file. The mechanics of this are identical to the View as described 
earlier.

The Template uses the output buffer to collect output, but it does
not actually wrap and send this output until the script shuts down, hence why 
all of these methods can be called at any point during execution and still have
proper effect.

It should be noted that the `Template` library works in any case where template
is initialized (such as in `global.php`). This means that it can wrap output
not only from a controller method but also from a direct script if the framework
is being used outside the confines of the MVC paradigm).

### Database Manager

The database manager is a singleton that stores a MySQLi connection. By invoking
the `DB` object rather than trying to pass a MySQL connection handle around, one
may ensure that they do not create additional database connections needlessly.

Database connection parameters are set in `global.php`.

When one wishes to make a database query, they can access the MySQLi handle 
managed by `DB` by invoking:

```php
DB::mysqli()->...
```

For example, one might get a MySQLi_Result object as:

```php
$result = DB::mysqli->query($sql);
```

### Active Record Model

The `Active_Record_Model` object is designed to represent a single row within
a database table, providing the ability to perform CRUD operations 
(create-read-update-delete) in an efficient, object-oriented manner without
writing needless SQL.

While `Active_Record_Model` can be used directly, ECTA prefers the convention
whereby each table is represented by a model that extends `Active_Record_Model`
as follows:

```php
class User_Model extends Active_Record_Model {
    public function __construct($key = null, $col = 'id'){
        parent::__construct('user', $key, $col)
    }
}
```

As an example of some of the operations available:

```php
$new_user_model = new User_Model();     // create unbound ("new") model
$new_user_model->name_first = 'John';
$new_user_model->name_last = 'Doe';
var_dump($new_user_model->exists());    // bool(false)
$pkid = $new_user_model->create();      // returns primary key of the created row
var_dump($new_user_model->exists());    // bool(true)

$user_model = new User_Model($pkid);    // create bounded ("existing") model
var_dump($user_model->exists());        // bool(true)
var_dump($user_model->name_first);      // string("John")
$user_model->name_first = 'Jane';       // set new value in local buffer

var_dump($new_user_model->name_first)   // string("John") as change to $user_model only in buffer
var_dump($user_model->name_first)       // string("Jane") 

$user_model->update();                  // set changes to $user_model in database row

var_dump($new_user_model->name_first)   // string("John") as value is already cached
$new_user_model->refresh();             // refresh values from database
var_dump($new_user_model->name_first)   // string("Jane") as model was refreshed to latest value

$user_model->delete();                  // immediately delete the row from the database
var_dump($user_model->exists());        // bool(false)
```

This example is far more complex than the general use case, but it was chosen to
show a whole plethora of operations (create, read, update, delete, caching,
refresh). While a simple version might simply save to the database every time
a change occurs to an object property, and it might always fetch the new data
every time a property is read (always getting the latest value from the database),
this has performance implications. Instead, the `Active_Record_Model` includes
several features that reduce its database strain:

* Lazy Instantiation: Values are only retrieved from the database when they're
requested the first time. Constructing a new `Active_Record_Model` but not
accessing any properties that must be fetched from the database will not
result in a database query.
* Batch Update: The `Active_Record_Model` does not automatically issue update
queries to the database. Instead, it buffers intended writes and awaits a call
to `->update()` before it actually updates the database row. The same is true
with `->create()` where it waits to create the row until explicitly stated.
* Bulk Loader: In some cases, one must construct a number of `Active_Record_Model`
objects at once. Rather than define each one individually, which causes a database
query for each, instead one may fetch a result set and then construct a number of
active record models.

An example of bulk loading is as follows:

```php
$result = DB::mysqli()->query('SELECT * FROM user;');
$arr = array();
while($row = $result->fetch_assoc()){
    $obj = new User_Model($row['id']);
    $obj->load($row);
    $arr[] = $obj;
}
```

This will yield an array of `User_Model` objects. This is a very common pattern,
so common infact that ECTA has a convention for doing it. When one needs to
construct a set of models, they should create a static method prefixed with
`build_` within the model itself. The `User_Model` might thus become:

```php
class User_Model extends Active_Record_Model {
    public function __construct($key = null, $col = 'id'){
        parent::__construct('user', $key, $col)
    }
    public static function build_all(){
        $result = DB::mysqli()->query('SELECT * FROM user;');
        $arr = array();
        while($row = $result->fetch_assoc()){
            $obj = new User_Model($row['id']);
            $obj->load($row);
            $arr[] = $obj;
        }
        return $arr;
    }
}
```

### WebBlocks

WebBlocks is a responsive web toolkit currently under development by UCLA and 
the MWF Community. It provides a number of libraries intended to assist with 
front-end development, including a rich SASS-based stylesheet methodology, 
libraries like Compass and Twitter Bootstrap, and a number of polyfills and 
normalization libraries.

More information can be found here:
https://github.com/ucla/WebBlocks

Note that this is currently under active development (report issues to its
GitHub project), but that ECTA is nonetheless using it in its development 
efforts, as it does provide a number of useful tools even in its present state
and because the use of an in-development tool helps with bug testing.

In order to run WebBlocks, you will need to install:

* Node.js (with NPM)
* Ruby (with Bundler)

WebBlocks includes a `Gemfile` so that an invocation of `bundle` will install
all Ruby dependencies and a `package.json` file so that an invocation of `npm install`
will install all Node.js dependencies. See the WebBlocks README.md file for more
information on the installation process if needed.
