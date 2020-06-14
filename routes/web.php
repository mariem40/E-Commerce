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
//Route::get('/ad', 'AdminController@index')->name('ad');
Route::resource('products', 'ProductController');
Route::delete('products/force/{id}', 'ProductController@forceDestroy')->name('products.force.destroy');
Route::put('products/restore/{id}', 'ProductController@restore')->name('products.restore');
Route::get('category/{slug}/products', 'ProductController@index')->name('products.category');
Route::get('/search','ProductController@search');
Route::resource('categories', 'CategorieController');
Route::get('/categories','CategorieController@index');
Route::get('/categories/create','CategorieController@create');
Route::get('/categories/show/{categorie}','CategorieController@show');
Route::get('/categories/edit/{categorie}','CategorieController@edit');
Route::put('/categories/update/{categorie}','CategorieController@update');

Route::post('/categories/store/','CategorieController@store');
Route::delete('categories/delete/{categorie}', 'CategorieController@destroy')->name('categories.destroy');
Route::delete('categories/force/{categorie}', 'CategorieController@forceDestroy')->name('categories.force.destroy');
Route::put('categories/restore/{categorie}', 'CategorieController@restore')->name('categories.restore');
Route::get('marque/{name}/products','ProductController@index')->name('products.marque');
Route::get('/searchp','ProductController@searchp')->name('products.search');
Route::get('/search','CategorieController@search');
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/home', 'AdminController@index')->name('home');
//Route::get('/deconnexion',function(){
	//Auth::logout();
	//return redirect('/login');
//});
Auth::routes(['verify'=>true]);
Route::get('protege',function(){
	return'affichage de la route protégé';
})->middleware('verified');
//Route::get('/home', 'AdminController@index')->name('home');
Route::resource('marques', 'MarqueController');
Route::delete('marques/force/{marque}', 'MarqueController@forceDestroy')->name('marques.force.destroy');
//Route::put('marques/restore/{marque}', 'MarqueController@restore')->name('marques.restore');
Route::resource('users','UserController');
    /*product route*/
Route::get('/xen', 'FrontController@index')->name('xen');


Route::get('category_/{id}', 'FrontProdController@getProdByCategorie')->name('frontend.products.index');
Route::get('frontend/products/show/{product}','FrontProdController@show');
   /*panier route */
 Route::get('/panier','CartController@index')->name('cart.index');  
Route::post('panier/ajouter','CartController@store')->name('cart.store');
Route::patch('panier/rowID}','CartController@update')->name('cart.update');
Route::delete('/panier/{id}','CartController@destroy')->name('cart.destroy');
Route::get('/videpanier',function(){
	Cart::destroy();
});
Route::resource('admins', 'AdminsController');
Route::resource('clients', 'ClientController');
 Route::get('commande', 'CommandeController@index');
// Route::get('account','AccountController@index');
Route::get('seconnecter', 'AccountController@showLoginForm')->name('seconnecter');
Route::post('seconnecter', 'AccountController@login');
Route::get('verif','VerificationController@resend');
Route::get('email/verify','VerificationController@show');
Route::get('email/verify','VerificationController@show');
Route::post('auth/login', 'AccountController@postLogin');
Route::get('auth/logout', 'AccountController@getLogout');
Route::get('auth/confirm/{token}', 'AccountController@getConfirm');
 
/*// Resend routes...
Route::get('auth/resend', 'Auth\AuthController@getResend');
 
// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
 
// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
 
// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');*/