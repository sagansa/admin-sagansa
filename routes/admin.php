<?php

use App\Http\Livewire\Analytics;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Users\ListUsers;
use App\Http\Livewire\Admin\Profile\UpdateProfile;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Livewire\Admin\Appointments\ListAppointments;
use App\Http\Livewire\Admin\Appointments\CreateAppointmentForm;
use App\Http\Livewire\Admin\Appointments\UpdateAppointmentForm;
use App\Http\Livewire\Admin\BankAccounts\ListBankAccounts;
use App\Http\Livewire\Admin\Categories\ListFranchiseCategories;
use App\Http\Livewire\Admin\Categories\ListMaterialCategories;
use App\Http\Livewire\Admin\Categories\ListOnlineCategories;
use App\Http\Livewire\Admin\Categories\ListPaymentCategories;
use App\Http\Livewire\Admin\Categories\ListRestaurantCategories;
use App\Http\Livewire\Admin\Messages\ListConversationAndMessages;
use App\Http\Livewire\Admin\Products\ListProducts;
use App\Http\Livewire\Admin\Settings\UpdateSetting;
use App\Http\Livewire\Admin\Units\ListUnits;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::get('users', ListUsers::class)->name('users');
Route::get('units', ListUnits::class)->name('units');
Route::get('material-categories', ListMaterialCategories::class)->name('material-categories');
Route::get('franchise-categories', ListFranchiseCategories::class)->name('franchise-categories');
Route::get('online-categories', ListOnlineCategories::class)->name('online-categories');
Route::get('payment-categories', ListPaymentCategories::class)->name('payment-categories');
Route::get('restaurant-categories', ListRestaurantCategories::class)->name('restaurant-categories');
Route::get('bank-accounts', ListBankAccounts::class)->name('bank-accounts');
Route::get('products', ListProducts::class)->name('products');

Route::get('appointments', ListAppointments::class)->name('appointments');
Route::get('appointments/create', CreateAppointmentForm::class)->name('appointments.create');
Route::get('appointments/{appointment}/edit', UpdateAppointmentForm::class)->name('appointments.edit');

Route::get('profile', UpdateProfile::class)->name('profile.edit');

Route::get('analytics', Analytics::class)->name('analytics');

Route::get('settings', UpdateSetting::class)->name('settings');

Route::get('messages', ListConversationAndMessages::class)->name('messages');
