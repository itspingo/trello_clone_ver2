<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ActiveStatusController;
use App\Http\Controllers\Api\BoardsController;
use App\Http\Controllers\Api\BoardListsController;
use App\Http\Controllers\Api\CardActivitiesController;
use App\Http\Controllers\Api\CardAttachmentsController;
use App\Http\Controllers\Api\CardButtonsController;
use App\Http\Controllers\Api\CardButtonActionsController;
use App\Http\Controllers\Api\CardCheckListsController;
use App\Http\Controllers\Api\CardInvitationsController;
use App\Http\Controllers\Api\CardLabelsController;
use App\Http\Controllers\Api\CheckListItemsController;
use App\Http\Controllers\Api\CountriesController;
use App\Http\Controllers\Api\ListCardsController;
use App\Http\Controllers\Api\StarredObjectsController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\UserProfileController;
use App\Http\Controllers\Api\WorkspacesController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public routes
Route::get('/public-info', function () {
    return response()->json(['message' => 'This is a public route.']);
});

Route::apiResource('active-statuses', ActiveStatusController::class);
Route::apiResource('boards', BoardsController::class);
Route::apiResource('board-lists', BoardListsController::class);
Route::apiResource('card-activities', CardActivitiesController::class);
Route::apiResource('card-attachments', CardAttachmentsController::class);
Route::apiResource('card-buttons', CardButtonsController::class);
Route::apiResource('card-button-actions', CardButtonActionsController::class);
Route::apiResource('card-check-lists', CardCheckListsController::class);
Route::apiResource('list-cards', ListCardsController::class);
Route::apiResource('starred-objects', StarredObjectsController::class);
Route::apiResource('countries', CountriesController::class);
Route::apiResource('card-invitations', CardInvitationsController::class);
Route::apiResource('check-list-items', CheckListItemsController::class);
Route::apiResource('card-labels', CardLabelsController::class);
Route::apiResource('users', UsersController::class);
Route::apiResource('user-profiles', UserProfileController::class);
Route::apiResource('workspaces', WorkspacesController::class);


