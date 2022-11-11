 <?php

    use App\Http\Controllers\Backend\CategoryController;
    use App\Http\Controllers\Backend\PermissionController;
    use App\Http\Controllers\Backend\ProfileController;
    use App\Http\Controllers\Backend\RoleController;
    use App\Http\Controllers\Backend\UserController;
    use App\Models\Category;
    use Illuminate\Support\Facades\Route;

    /*
|-----------------------------------------   ---------------------------------
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

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(
        ['middleware' => ['auth']],
        function () {
            Route::resource('roles', RoleController::class);
            Route::resource('permissions', PermissionController::class);
            Route::resource('users', UserController::class);
            Route::resource('categories', CategoryController::class);
            Route::get('profile/edit/', [ProfileController::class, 'Profile'])->name('profile');
            Route::post('profile/update/', [ProfileController::class, 'UpdateProfile'])->name('update-profile');
            Route::get('password/change/', [ProfileController::class, 'Password'])->name('password');
            Route::post('password/update', [ProfileController::class, 'UpdatePassword'])->name('update-password');
        }
    );
