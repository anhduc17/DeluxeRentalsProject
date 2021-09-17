<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//----------------Site navigation---------------------------

    //Route for homepage
    Route::get('homepage','SiteController@Homepage');
    Route::get('contact','SiteController@Contact');
    Route::get('about','SiteController@About');
    Route::get('manage','SiteController@Manage');
    Route::get('service','SiteController@Service');

    //Route for booking
    Route::get('booking','OrderController@BookCar');

    Route::get('add-to-cart/{id}','OrderController@addToCart');
    Route::get('cart', 'OrderController@cart');
    
    Route::post('checkoutcart', 'OrderController@checkout');
    Route::delete('remove-from-cart', 'OrderController@remove');



//----------------Car CRUD---------------------------
    //01. Index
    Route::get('carindex','CarController@CarIndex');
    //02. Create
    Route::get('carcreate','CarController@CreateCar');
    Route::post('carcreate','CarController@StoreCar');
    //03.Update
    Route::get('carupdate/{id}','CarController@EditCar');
    Route::post('carupdate/{id}','CarController@UpdateCar');
    //04.DElete
    Route::get('cardelete/{id}','CarController@DeleteCar');





//----------------Staff CRUD---------------------------
    //01.READ 
    Route::get('staffindex', 'StaffController@index');
    //02.CREAT 
    Route::get('staffcreate', 'StaffController@create');
    Route::post('staffcreate', 'StaffController@createProcess');
    //03. UPDATE 
    Route::get('staffupdate/{StaffID}', 'StaffController@update');
    Route::post('staffupdate/{StaffID}', 'StaffController@updateProcess');
    //04. DELETE
    Route::get('staffdelete/{StaffID}', 'StaffController@delete');




//----------------Driver CRUD---------------------------
        //01.READ 
        Route::get('driverindex', 'DriverController@index');
        //02.CREAT 
        Route::get('drivercreate', 'DriverController@create');
        Route::post('drivercreate', 'DriverController@createProcess');
        //03. UPDATE  
        Route::get('driverupdate/{id}', 'DriverController@update');
        Route::post('driverupdate/{id}', 'DriverController@updateProcess');
        //04. DELETE
        Route::get('driverdelete/{id}', 'DriverController@delete');


Route::get('customerindex','CustomerController@index');


//----------------Brand CRUD---------------------------
        Route::get('brandindex','BrandController@BrandIndex');

        Route::get('brandcreate','BrandController@CreateBrand');
        Route::post('brandcreate','BrandController@StoreBrand');

        Route::get('brandupdate/{id}','BrandController@EditBrand');
        Route::post('brandupdate/{id}','BrandController@UpdateBrand');

        Route::get('branddelete/{id}','BrandController@DeleteBrand');


//----------------Customer CRUD---------------------------
//01.READ - http://localhost:8080/DeluxeRentalsProject/public/customerindex
Route::get('customerindex','CustomerController@customerindex');
Route::get('customerprofile','CustomerController@customerprofile');
Route::get('mybooking','CustomerController@myBooking');
//02. UPDATE - http://localhost:8080/DeluxeRentalsProject/public/customerupdate/{id}
Route::get('customerupdate/{id}','CustomerController@UpdateCustomer');
Route::post('customerupdate/{id}','CustomerController@UpdateCustomerProcess');

Route::get('customeredit/{id}','CustomerController@IndexEdit');
Route::post('customeredit/{id}','CustomerController@EditProcess');

//03. UPDATE PASSWORD - http://localhost:8080/DeluxeRentalsProject/public/customerpasswordupdate/{cid}
Route::get('customerpassupdate/{id}','CustomerController@UpdatePassword');
Route::post('customerpassupdate/{id}','CustomerController@UpdatePasswordProcess');

//04. DELETE
Route::get('customerdelete/{id}','CustomerController@CustomerDelte');


//----------------Maintenance CRUD---------------------------

Route::get('maintenanceindex','MaintenanceController@MaintenanceIndex');

Route::get('maintenancecreate','MaintenanceController@CreateMaintenance');
Route::post('maintenancecreate','MaintenanceController@StoreMaintenance');

Route::get('maintenanceupdate/{id}','MaintenanceController@EditMaintenance');
Route::post('maintenanceupdate/{id}','MaintenanceController@UpdateMaintenance');

Route::get('maintenancedelete/{id}','MaintenanceController@DeleteMaintenance');

//----------------Feedback CRUD---------------------------
//01.READ - http://localhost:8080/DeluxeRentalsProject/public/feedbackindex
Route::get('feedbackindex','FeedbackController@feedbackindex');
//02.CREATE - http://localhost:8080/DeluxeRentalsProject/public/customercreate
Route::get('feedbackcreate', 'FeedbackController@feedbackcreate');
Route::post('feedbackcreate', 'FeedbackController@feedbackcreateprocess');
//03. UPDATE - http://localhost:8080/DeluxeRentalsProject/public/customerupdate/{fid}
Route::get('feedbackupdate/{fid}','FeedbackController@Updatefeedback');
Route::post('feedbackupdate/{fid}', 'FeedbackController@Updatefeedbackprocess');
//04. DELETE - http://localhost:8080/DeluxeRentalsProject/public/feedbackdelete/{fid}
Route::get('feedbackdelete/{fid}', 'FeedbackController@DeleteFeedback');


//----------------Registration Login Logout Password Routes---------------------------
Route::get('register', 'Auth\RegisterController@register');
Route::post('register', 'Auth\RegisterController@store')->name('register');

Route::get('login', 'Auth\LoginController@login');
Route::post('login', 'Auth\LoginController@store')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('forget-password', 'Auth\ForgotPasswordController@getEmail');
Route::post('forget-password', 'Auth\ForgotPasswordController@postEmail');

Route::get('reset-password/{token}', 'Auth\ResetPasswordController@getPassword');
Route::post('reset-password', 'Auth\ResetPasswordController@updatePassword');

//----------------COntract Routes---------------------------

Route::get('contractindex','ContractController@contractIndex');
Route::get('contractdelete/{id}','ContractController@contractDelete');
Route::get('contractdetail/{id}','ContractController@seeContractDetail');
