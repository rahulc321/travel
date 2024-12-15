<?php
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;


Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);

Route::get('/ip', function (Request $request) {
    try {
        // Fetch IPv4
        $ipv4 = Http::get('https://api64.ipify.org')->body();

        // Attempt to fetch IPv6
        $ipv6 = Http::get('https://ifconfig.me/ipv6')->successful() ? Http::get('https://ifconfig.me/ipv6')->body() : 'Not available';

    } catch (\Exception $e) {
        $ipv4 = 'Unable to fetch IPv4';
        $ipv6 = 'Unable to fetch IPv6';
    }

    return response()->json([
        'ipv4' => $request->ip(),
        'ipv6' => $ipv6,
    ]);
});

 Route::any('/customLogin', 'Auth\LoginController@customLogin')->name('customLogin');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth','check.ip']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Case Intake
    Route::resource('case_intake', 'CaseController');
    Route::any('party-delete/{id}', 'CaseController@partyDelete');
 
    Route::resource('lead', 'LeadsController');
    Route::resource('card', 'CardsController');
    Route::resource('merchant', 'MarchentController');
    Route::resource('ip-whitelist', 'IPWhitelistController');

    Route::any('sales', 'LeadsController@sales')->name('sales');
    Route::any('salesEdit/{id}', 'LeadsController@salesEdit')->name('sales.edit');
    Route::any('salesDestroy/{id}', 'LeadsController@salesDestroy')->name('sales.destroy');
    
    Route::any('approve/{id}', 'LeadsController@salesApprove')->name('sales.approve');
    Route::any('salesRejct/{id}', 'LeadsController@salesRejct')->name('sales.reject');
    Route::any('salesUpdate/{id}', 'LeadsController@salesUpdate')->name('salesUpdate');

    Route::any('update_profile', 'UsersController@update_profile')->name('update_profile');


});
