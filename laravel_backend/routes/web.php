<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Baseline\HomeController;
use Illuminate\Support\Facades\Storage;
//use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Backend\Baseline\designer;
use App\Http\Controllers\Backend\Baseline\designer_add;
use App\Http\Controllers\Backend\Baseline\designer_edit;

 use App\Http\Controllers\Backend\Workspaces;
 use App\Http\Controllers\Frontend\Home;
 use App\Http\Controllers\Frontend\About;
 use App\Http\Controllers\Frontend\Team;
 use App\Http\Controllers\Frontend\Contact;
 use App\Http\Controllers\Frontend\Faqs;
 use App\Http\Controllers\Frontend\Price;
  use App\Http\Controllers\Frontend\Login;
 use App\Http\Controllers\Frontend\Register;
 use App\Http\Controllers\Frontend\Forgot;
 
 use App\Http\Controllers\Frontend\Websiteauth;
 use App\Http\Controllers\Backend\Boards;
 use App\Http\Controllers\Backend\Board_Lists;
 use App\Http\Controllers\Backend\List_Cards;
 use App\Http\Controllers\Backend\Invitations;
 use App\Http\Controllers\Backend\Labels;
 use App\Http\Controllers\Backend\Check_Lists;
 use App\Http\Controllers\Backend\Check_List_Items;
 use App\Http\Controllers\Backend\Attachment;
 use App\Http\Controllers\Backend\Card_Buttons;
 use App\Http\Controllers\Backend\Button_Actions;
 use App\Http\Controllers\Backend\Activities;
 
 use App\Http\Controllers\Backend\Users;

//  use App\Http\Livewire\BoardIndex;
 use App\Http\Controllers\Frontend\Lwboard;
 use App\Http\Controllers\Frontend\Board;
 use App\Http\Controllers\Frontend\Workspace;
 use App\Http\Controllers\Frontend\Counter;
 
 /*[[useControllerLine]]*/                                                                                                                    

 //Route::get('/', function () {
 //    return view('welcome');
 //});
 
// Route::get('/', function () {
//     return view('frontend/home'); 
// });


Route::get('/link', function () {        
    $target =   '/home/sites/29b/e/e0347b3c2e/public_html/snoobix.com/demo/trello_clone/laravel/storage/app/public';
    $shortcut = '/home/sites/29b/e/e0347b3c2e/public_html/snoobix.com/demo/trello_clone/storage';
    symlink($target, $shortcut);
 });

 Route::get('backend/login', [AuthController::class, 'index'])->name('backend.login');
 Route::POST('backend/post-login', [AuthController::class, 'postLogin'])->name('backend.login.post'); 
 Route::get('backend/registration', [AuthController::class, 'registration'])->name('backend.register');
 Route::post('backend/post-registration', [AuthController::class, 'postRegistration'])->name('backend.register.post'); 

//  Route::middleware(['auth', CheckUserSide::class . ':backend'])->group(function () {
  
    Route::get('backend/dashboard', [AuthController::class, 'backend.dashboard']); 
    Route::get('backend/logout', [AuthController::class, 'logout'])->name('backend.logout');

    Route::get('backend/home', [HomeController::class, 'index'])->middleware(['auth'])->name('backend.home');
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth'])->name('dashboard');
        
    // Route::get('backend/adminpanel' , [Adminpanel::class,'index'])->middleware(['auth'])->name('backend.adminpanel');
    // Route::get('backend/module' , [module::class,'index'])->middleware(['auth']);
    // Route::get('backend/add' , [add::class,'index'])->middleware(['auth']);
    // Route::post('backend/save' , [save::class,'index'])->middleware(['auth']);
    // Route::any('backend/update' , [update::class,'index'])->middleware(['auth']);
    // Route::post('backend/search' , [search::class,'index'])->middleware(['auth']);
    // Route::get('backend/edit' , [edit::class,'index'])->middleware(['auth']);
    // Route::get('backend/delete' , [delete::class,'index'])->middleware(['auth']);
    // Route::get('/show_img' , [show_img::class,'index']);

    Route::get('backend/designer', [designer::class,'index'])->middleware(['auth']);
    Route::get('backend/designer_add' , [designer_add::class,'index'])->middleware(['auth'])->name('backend.designer_add');
    Route::post('backend/designer_add/save' , [designer_add::class,'save']);
    Route::post('backend/designer_add/generate' , [designer_add::class,'generate']);
    Route::get('backend/designer_add/ajax_module_fields' , [designer_add::class,'ajax_module_fields']);
    //ajax_module_fields
    
    Route::get('backend/show_sidepanel' , [designer_add::class,'show_sidepanel']);
    Route::get('backend/ajax_item_properties' , [designer_add::class,'ajax_item_properties']);
    Route::get('backend/designer_add/ajax_table_fields' , [designer_add::class,'ajax_table_fields']);
    Route::get('backend/dznr_delete' , [designer_add::class,'dznr_delete']);
    Route::get('backend/designer_edit' , [designer_edit::class,'index'])->middleware(['auth']);
    Route::post('backend/designer_edit' , [designer_edit::class,'update']);

// });

// ------------------------- front end website ------------------------ //

// Route::get('under_maintenance', [Under_maintenance::class, 'index'])->name('under_maintenance');

// Route::get('currencytest', [Currencytest::class, 'index'])->name('currencytest');

// Route::get('contactus', [Contactus::class, 'index'])->name('contactus');
// Route::post('contactus/send_info', [Contactus::class, 'send_info'])->name('contactus.send_info');
// Route::post('newsletter/subscribe', [Newsletter::class, 'subscribe'])->name('newsletter.subscribe');
// Route::post('newsletter/confirm/{recid}', [Newsletter::class, 'confirm'])->name('newsletter.confirm');

Route::get('/', [Home::class, 'index']);
Route::get('home', [Home::class, 'index'])->name('home');

Route::get('about', [About::class, 'index'])->name('about');
Route::get('team', [Team::class, 'index'])->name('team');
Route::get('contact', [Contact::class, 'index'])->name('contact');
Route::get('faqs', [Faqs::class, 'index'])->name('faqs');
Route::get('price', [Price::class, 'index'])->name('price');
Route::get('forgot', [Forgot::class, 'index'])->name('forgot');

Route::get('login', [Login::class, 'index'])->name('login');
Route::get('login/validate/{code}', [Login::class, 'validate_user']); 
Route::post('login/postLogin', [Login::class, 'postLogin'])->name('login.post');
Route::get('register', [Register::class, 'register'])->name('register');
Route::post('register/postRegister', [Register::class, 'postRegister'])->name('register.post');
Route::get('logout', [Login::class, 'logout'])->name('logout');
Route::get('forgot', [Forgot::class, 'index'])->name('forgot');
Route::get('forgot', [Forgot::class, 'postForgot'])->name('forgot');

// Route::get('/boards/{board}', BoardIndex::class)->name('board.show');

Route::get('/lwboard', [Lwboard::class, 'index'])->name('lwboard');
Route::get('board/create_list',[Lwboard::class, 'create_list'])->name('board.create_list');
Route::get('/board', [Board::class, 'index'])->name('board');
Route::get('/workspace', [Workspace::class, 'index'])->name('workspace');

Route::get('/counter', [Counter::class,'index'])->name('counter');
// Route::get('/counter', function () {
//     return view('counter');
// });

// Route::get('shop_items', [Shop::class, 'index'])->name('shop');

// Route::get('/stripe', [StripeController::class, 'index'])->name('index');
// Route::get('/stripe/checkout/{orderid}', [StripeController::class, 'checkout'])->name('frontend.stripe.checkout');
// Route::get('/stripe/success', [StripeController::class, 'success'])->name('frontend.stripe.success');
// Route::get('/stripe/cancel', [StripeController::class, 'cancel'])->name('frontend.stripe.cancel');


Route::get('backend/workspaces', [Workspaces::class, 'index'])->middleware(['auth'])->name('backend.workspaces');
Route::get('backend/workspaces/create', [Workspaces::class, 'create'])->middleware(['auth'])->name('backend.workspaces.create');
Route::post('backend/workspaces', [Workspaces::class, 'store'])->middleware(['auth'])->name('backend.workspaces.store');
Route::get('backend/workspaces/{id}', [Workspaces::class, 'show'])->middleware(['auth'])->name('backend.workspaces.show');
Route::get('backend/workspaces/{id}/edit', [Workspaces::class, 'edit'])->middleware(['auth'])->name('backend.workspaces.edit');
Route::post('backend/workspaces/update', [Workspaces::class, 'update'])->middleware(['auth'])->name('backend.workspaces.update');
Route::post('backend/workspaces/delete', [Workspaces::class, 'destroy'])->middleware(['auth'])->name('backend.workspaces.delete');

Route::get('backend/boards', [Boards::class, 'index'])->middleware(['auth'])->name('backend.boards');
Route::get('backend/boards/create', [Boards::class, 'create'])->middleware(['auth'])->name('backend.boards.create');
Route::post('backend/boards', [Boards::class, 'store'])->middleware(['auth'])->name('backend.boards.store');
Route::get('backend/boards/{id}', [Boards::class, 'show'])->middleware(['auth'])->name('backend.boards.show');
Route::get('backend/boards/{id}/edit', [Boards::class, 'edit'])->middleware(['auth'])->name('backend.boards.edit');
Route::post('backend/boards/update', [Boards::class, 'update'])->middleware(['auth'])->name('backend.boards.update');
Route::post('backend/boards/delete', [Boards::class, 'destroy'])->middleware(['auth'])->name('backend.boards.delete');
Route::get('backend/board_lists', [Board_Lists::class, 'index'])->middleware(['auth'])->name('backend.board_lists');
Route::get('backend/board_lists/create', [Board_Lists::class, 'create'])->middleware(['auth'])->name('backend.board_lists.create');
Route::post('backend/board_lists', [Board_Lists::class, 'store'])->middleware(['auth'])->name('backend.board_lists.store');
Route::get('backend/board_lists/{id}', [Board_Lists::class, 'show'])->middleware(['auth'])->name('backend.board_lists.show');
Route::get('backend/board_lists/{id}/edit', [Board_Lists::class, 'edit'])->middleware(['auth'])->name('backend.board_lists.edit');
Route::post('backend/board_lists/update', [Board_Lists::class, 'update'])->middleware(['auth'])->name('backend.board_lists.update');
Route::post('backend/board_lists/delete', [Board_Lists::class, 'destroy'])->middleware(['auth'])->name('backend.board_lists.delete');
Route::get('backend/list_cards', [List_Cards::class, 'index'])->middleware(['auth'])->name('backend.list_cards');
Route::get('backend/list_cards/create', [List_Cards::class, 'create'])->middleware(['auth'])->name('backend.list_cards.create');
Route::post('backend/list_cards', [List_Cards::class, 'store'])->middleware(['auth'])->name('backend.list_cards.store');
Route::get('backend/list_cards/{id}', [List_Cards::class, 'show'])->middleware(['auth'])->name('backend.list_cards.show');
Route::get('backend/list_cards/{id}/edit', [List_Cards::class, 'edit'])->middleware(['auth'])->name('backend.list_cards.edit');
Route::post('backend/list_cards/update', [List_Cards::class, 'update'])->middleware(['auth'])->name('backend.list_cards.update');
Route::post('backend/list_cards/delete', [List_Cards::class, 'destroy'])->middleware(['auth'])->name('backend.list_cards.delete');

Route::get('backend/invitations', [Invitations::class, 'index'])->middleware(['auth'])->name('backend.invitations');
Route::get('backend/invitations/create', [Invitations::class, 'create'])->middleware(['auth'])->name('backend.invitations.create');
Route::post('backend/invitations', [Invitations::class, 'store'])->middleware(['auth'])->name('backend.invitations.store');
Route::get('backend/invitations/{id}', [Invitations::class, 'show'])->middleware(['auth'])->name('backend.invitations.show');
Route::get('backend/invitations/{id}/edit', [Invitations::class, 'edit'])->middleware(['auth'])->name('backend.invitations.edit');
Route::post('backend/invitations/update', [Invitations::class, 'update'])->middleware(['auth'])->name('backend.invitations.update');
Route::post('backend/invitations/delete', [Invitations::class, 'destroy'])->middleware(['auth'])->name('backend.invitations.delete');

Route::get('backend/labels', [Labels::class, 'index'])->middleware(['auth'])->name('backend.labels');
Route::get('backend/labels/create', [Labels::class, 'create'])->middleware(['auth'])->name('backend.labels.create');
Route::post('backend/labels', [Labels::class, 'store'])->middleware(['auth'])->name('backend.labels.store');
Route::get('backend/labels/{id}', [Labels::class, 'show'])->middleware(['auth'])->name('backend.labels.show');
Route::get('backend/labels/{id}/edit', [Labels::class, 'edit'])->middleware(['auth'])->name('backend.labels.edit');
Route::post('backend/labels/update', [Labels::class, 'update'])->middleware(['auth'])->name('backend.labels.update');
Route::post('backend/labels/delete', [Labels::class, 'destroy'])->middleware(['auth'])->name('backend.labels.delete');

Route::get('backend/check_lists', [Check_Lists::class, 'index'])->middleware(['auth'])->name('backend.check_lists');
Route::get('backend/check_lists/create', [Check_Lists::class, 'create'])->middleware(['auth'])->name('backend.check_lists.create');
Route::post('backend/check_lists', [Check_Lists::class, 'store'])->middleware(['auth'])->name('backend.check_lists.store');
Route::get('backend/check_lists/{id}', [Check_Lists::class, 'show'])->middleware(['auth'])->name('backend.check_lists.show');
Route::get('backend/check_lists/{id}/edit', [Check_Lists::class, 'edit'])->middleware(['auth'])->name('backend.check_lists.edit');
Route::post('backend/check_lists/update', [Check_Lists::class, 'update'])->middleware(['auth'])->name('backend.check_lists.update');
Route::post('backend/check_lists/delete', [Check_Lists::class, 'destroy'])->middleware(['auth'])->name('backend.check_lists.delete');

Route::get('backend/check_list_items', [Check_List_Items::class, 'index'])->middleware(['auth'])->name('backend.check_list_items');
Route::get('backend/check_list_items/create', [Check_List_Items::class, 'create'])->middleware(['auth'])->name('backend.check_list_items.create');
Route::post('backend/check_list_items', [Check_List_Items::class, 'store'])->middleware(['auth'])->name('backend.check_list_items.store');
Route::get('backend/check_list_items/{id}', [Check_List_Items::class, 'show'])->middleware(['auth'])->name('backend.check_list_items.show');
Route::get('backend/check_list_items/{id}/edit', [Check_List_Items::class, 'edit'])->middleware(['auth'])->name('backend.check_list_items.edit');
Route::post('backend/check_list_items/update', [Check_List_Items::class, 'update'])->middleware(['auth'])->name('backend.check_list_items.update');
Route::post('backend/check_list_items/delete', [Check_List_Items::class, 'destroy'])->middleware(['auth'])->name('backend.check_list_items.delete');

Route::get('backend/attachment', [Attachment::class, 'index'])->middleware(['auth'])->name('backend.attachment');
Route::get('backend/attachment/create', [Attachment::class, 'create'])->middleware(['auth'])->name('backend.attachment.create');
Route::post('backend/attachment', [Attachment::class, 'store'])->middleware(['auth'])->name('backend.attachment.store');
Route::get('backend/attachment/{id}', [Attachment::class, 'show'])->middleware(['auth'])->name('backend.attachment.show');
Route::get('backend/attachment/{id}/edit', [Attachment::class, 'edit'])->middleware(['auth'])->name('backend.attachment.edit');
Route::post('backend/attachment/update', [Attachment::class, 'update'])->middleware(['auth'])->name('backend.attachment.update');
Route::post('backend/attachment/delete', [Attachment::class, 'destroy'])->middleware(['auth'])->name('backend.attachment.delete');

Route::get('backend/card_buttons', [Card_Buttons::class, 'index'])->middleware(['auth'])->name('backend.card_buttons');
Route::get('backend/card_buttons/create', [Card_Buttons::class, 'create'])->middleware(['auth'])->name('backend.card_buttons.create');
Route::post('backend/card_buttons', [Card_Buttons::class, 'store'])->middleware(['auth'])->name('backend.card_buttons.store');
Route::get('backend/card_buttons/{id}', [Card_Buttons::class, 'show'])->middleware(['auth'])->name('backend.card_buttons.show');
Route::get('backend/card_buttons/{id}/edit', [Card_Buttons::class, 'edit'])->middleware(['auth'])->name('backend.card_buttons.edit');
Route::post('backend/card_buttons/update', [Card_Buttons::class, 'update'])->middleware(['auth'])->name('backend.card_buttons.update');
Route::post('backend/card_buttons/delete', [Card_Buttons::class, 'destroy'])->middleware(['auth'])->name('backend.card_buttons.delete');

Route::get('backend/button_actions', [Button_Actions::class, 'index'])->middleware(['auth'])->name('backend.button_actions');
Route::get('backend/button_actions/create', [Button_Actions::class, 'create'])->middleware(['auth'])->name('backend.button_actions.create');
Route::post('backend/button_actions', [Button_Actions::class, 'store'])->middleware(['auth'])->name('backend.button_actions.store');
Route::get('backend/button_actions/{id}', [Button_Actions::class, 'show'])->middleware(['auth'])->name('backend.button_actions.show');
Route::get('backend/button_actions/{id}/edit', [Button_Actions::class, 'edit'])->middleware(['auth'])->name('backend.button_actions.edit');
Route::post('backend/button_actions/update', [Button_Actions::class, 'update'])->middleware(['auth'])->name('backend.button_actions.update');
Route::post('backend/button_actions/delete', [Button_Actions::class, 'destroy'])->middleware(['auth'])->name('backend.button_actions.delete');

Route::get('backend/activities', [Activities::class, 'index'])->middleware(['auth'])->name('backend.activities');
Route::get('backend/activities/create', [Activities::class, 'create'])->middleware(['auth'])->name('backend.activities.create');
Route::post('backend/activities', [Activities::class, 'store'])->middleware(['auth'])->name('backend.activities.store');
Route::get('backend/activities/{id}', [Activities::class, 'show'])->middleware(['auth'])->name('backend.activities.show');
Route::get('backend/activities/{id}/edit', [Activities::class, 'edit'])->middleware(['auth'])->name('backend.activities.edit');
Route::post('backend/activities/update', [Activities::class, 'update'])->middleware(['auth'])->name('backend.activities.update');
Route::post('backend/activities/delete', [Activities::class, 'destroy'])->middleware(['auth'])->name('backend.activities.delete');


Route::get('backend/users', [Users::class, 'index'])->middleware(['auth'])->name('backend.users');
Route::get('backend/users/create', [Users::class, 'create'])->middleware(['auth'])->name('backend.users.create');
Route::post('backend/users', [Users::class, 'store'])->middleware(['auth'])->name('backend.users.store');
Route::get('backend/users/{id}', [Users::class, 'show'])->middleware(['auth'])->name('backend.users.show');
Route::get('backend/users/{id}/edit', [Users::class, 'edit'])->middleware(['auth'])->name('backend.users.edit');
Route::post('backend/users/update', [Users::class, 'update'])->middleware(['auth'])->name('backend.users.update');
Route::post('backend/users/delete', [Users::class, 'destroy'])->middleware(['auth'])->name('backend.users.delete');



/*[[routeResouceLine]]*/
