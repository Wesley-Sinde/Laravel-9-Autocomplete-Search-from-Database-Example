
# Laravel 9 Autocomplete Search from Database Example
Laravel 9 ajax autocomplete search using jQuery typehead js; Through this tutorial, i am going to show you how to make ajax autocomplete search using jQuery typehead js with ajax from database in laravel 9 apps.
<p align="center"><a href="https://wesley.io.ke" target="_blank"><img src="https://laratutorials.com/wp-content/uploads/2022/02/Laravel-9-Autocomplete-Search-from-Database-Example-1024x499.jpg" width="400"></a></p>

# Laravel 9 Autocomplete Search from Database Example
Use the following steps to make ajax autocomplete search using jQuery typehead js from database in laravel 9 apps:
|#|Desc|
|---|---|
|Step 1 – |Install Laravel 9 Application|
|Step 2 – |Database Configuration|
|Step 3 – |Add Dummy Record|
|Step 4 – |Create Routes|
|Step 5 – |Creating Auto Fill Search Controller and Method|
|Step 6 – |Create Blade File|
|Step 7| – Start Development Server|
|Step 8 |– Run Laravel 9 jQuery Ajax Typehead Search Example App On Browser|


# Step 1 – Install Laravel 9 Application
In step 1, open your terminal and navigate to your local web server directory using the following command:
```php
//for windows user
cd xampp/htdocs

//for ubuntu user
cd var/www/html
```
Then install laravel latest application using the following command:

```php
composer create-project --prefer-dist laravel/laravel LaravelTypeheadExample
```
# Step 2 – Database Configuration
In step 2, open your downloaded laravel app into any text editor. Then find .env file and configure database detail like following:
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db name
DB_USERNAME=db user name
DB_PASSWORD=db password
Step 3 – Add Dummy Record
```
# In step 3, Generate dummy records into database table users. So, navigate database/seeders/ directory and open DatabaseSeeder.php file. Then add the following two line of code it:
```php
use App\Models\User;
User::factory(100)->create();
```
After that, open command prompt and navigate to your project by using the following command:

```php
cd / LaravelTypeheadExample
```
Now, open again your terminal and type the following command on cmd to create tables into your selected database:
```php
php artisan migrate
```
Next, run the following database seeder command to generate dummy data into database:
```php
php artisan db:seed
```
# Step 4 – Create Routes
In step 4, open your web.php file, which is located inside routes directory. Then add the following routes into web.php file:

```php
Route::get('typehead-autocomplete', [SearchAutoCompleteController::class, 'index']);
Route::get('search-auto-db', [SearchAutoCompleteController::class, 'searchQuery']);
```
# Step 5 – Creating Auto Fill Search Controller and Method
In step 5, create search autocomplete controller by using the following command:

php artisan make:controller SearchAutoCompleteController
The above command will create SearchAutoCompleteController.php file, which is located inside /app/Http/Controllers/ directory.

Then add the following controller methods into SearchAutoCompleteController.blade.php file:
```php
<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
class SearchAutoCompleteController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('search-autocomplete');
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchQuery(Request $request)
    {
        $data = User::select("name")
                ->where("name","LIKE","%{$request->get('query')}%")
                ->get();
   
        return response()->json($data);
    }
}
```
# Step 6 – Create Blade File
In step 6, create new blade view file that named search-autocomplete.blade.php inside resources/views directory for ajax get data from database.


Create Autocomplete Search Input Input Box
```php
<div class="container mt-3">
    <h1 class="mb-3">Laravel 9 Autocomplete Search using Bootstrap Typeahead JS - Wesley</h1>   
    <input class="typeahead form-control" type="text">
</div>
```
Add  jquery typeahead js plugin in form
```php
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>
Add ajax typehead js code for search
The following jQuery typehead js plugin library will help to design textbox and customize ajax search code:

   <script type="text/javascript">
    var path = "{{ url('search-auto-db') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>
```
The following jQuery typhead js plugin and ajax code will search and autocomplete data from database in laravel:
```php
<script type="text/javascript">
    var path = "{{ url('search-auto-db') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>
```
Don’t worry i have already added the jQuery typehead js and ajax code and library to search and autocomplete data from database in laravel on forms.

The full source code of search-autocomplete.blade.php file:

```php
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Typehead Search Autocomplete Example - LaraTutorials.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>
</head>
<body>
   
<div class="container mt-3">
    <h1 class="mb-3">Laravel 9 Autocomplete Search using Bootstrap Typeahead JS - Wesley</h1>   
    <input class="typeahead form-control" type="text">
</div>
   
<script type="text/javascript">
    var path = "{{ url('search-auto-db') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>
   
</body>
</html>
```
# Step 7 – Start Development Server
Finally, open your command prompt again and run the following command to start development server:
```php
php artisan serve
```

# Step 8 – Run Laravel 9 jQuery Ajax Typehead JS Search Example App On Browser
In step 8, open your browser and fire the following url into your browser:
```php
http://127.0.0.1:8000/typehead-autocomplete
```
