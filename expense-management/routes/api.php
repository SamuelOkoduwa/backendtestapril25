use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\UserController;

Route::post('/register', [AuthController::class, 'register']); // Admin only
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/expenses', [ExpenseController::class, 'index']); // List expenses
    Route::post('/expenses', [ExpenseController::class, 'store']); // Create expense
    Route::put('/expenses/{id}', [ExpenseController::class, 'update']); // Update expense
    Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy']); // Delete expense

    Route::middleware('can:manage-users')->group(function () {
        Route::get('/users', [UserController::class, 'index']); // List users
        Route::post('/users', [UserController::class, 'store']); // Add user
        Route::put('/users/{id}', [UserController::class, 'update']); // Update user role
    });
});
