<?php

namespace App\Http\Controllers;

use App\Exports\BoletasExport;
use App\Exports\MilitantesExport;
use App\Imports\MilitantesImport;
use App\Imports\NumeroreservadoImport;
use App\Models\Militante;
use App\Models\User;
use \Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use \App\Models\Loteria;
use \App\Models\Rol;
use \App\Models\Terminosycondiciones;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
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
//Route::group(['middleware'=>['guest']],function(){

    Route::get('/', [JuegosfarallonesController::class, 'index'])->name('juegosfarallones.index');
    //Route::post('/', [LoginController::class, 'authenticate'])->name('login.authenticate');

//});

//Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->group(function () {
        Route::post('/changepasssu', [LoginController::class, 'updatePasswordsu'])->name('changepass.updatesu');

        Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
        })->name('dashboard');

        // export
        Route::get('/users/export', [UserController::class, 'UsersExport'])->name('users.export');
        Route::get('/clientes/export', [UserController::class, 'ClientesExport'])->name('clientes.export');


        Route::get('/militantes/export', function (Request $request) {
            return Excel::download(new MilitantesExport($request), 'militantes.xlsx');
        })->name('militantes.export');


        Route::post('/militantes/import', [MilitanteController::class, 'importar'])->name('militantes.import');
        Route::get('/import-status', [MilitanteController::class, 'status']);

        Route::get('/militantes/import', function (Request $request) {
            Excel::import(new MilitantesImport($request), $request->file('file'));

            return redirect()->back()->with('message', 'Archivo importado correctamente');
        })->name('militantes.import');

        Route::get('/estados', [MasterController::class, 'estados'])->name('estados');
        Route::get('/nominado', [MasterController::class, 'nominado'])->name('nominado');
        Route::get('/modalidades', [MasterController::class, 'modalidades'])->name('modalidades');
        Route::get('/generos', [MasterController::class, 'generos'])->name('generos');
        Route::get('/niveleducativo', [MasterController::class, 'niveleducativo'])->name('niveleducativo');
        Route::get('/gruposetnicos', [MasterController::class, 'gruposetnicos'])->name('gruposetnicos');
        Route::get('/categorias', [MasterController::class, 'categorias'])->name('categorias');
        Route::get('/tiposarchivos', [MasterController::class, 'tiposarchivos'])->name('tiposarchivos');
        Route::get('/getArchivos', [MilitanteController::class, 'getArchivos'])->name('getArchivos');
        Route::post('/archivo/upload', [MilitanteController::class, 'archivoupload'])->name('fileUpload');
        Route::post('/archivocc/upload', [CuentasclarasController::class, 'archivoupload'])->name('fileUploadcc');

        Route::post('/nominaciones', [NominadoController::class, 'storenominacion'])->name('nominaciones');


        Route::get('/users/getClientes', [UserController::class, 'getClientes'])->name('users.clientes');
        Route::get('/ventas/sumary', [VentaController::class, 'sumary'])->name('sumary');

        Route::get('/users/getVendedoresActivos', [UserController::class, 'getVendedoresActivos'])->name('users.getVendedoresActivos');
        Route::get('/users/getClientesActivos', [UserController::class, 'getClientesActivos'])->name('users.getClientesActivos');
        Route::get('/users/indexclientes', [UserController::class, 'indexclientes'])->name('users.indexclientes');
        Route::get('/users/indexvendedores', [UserController::class, 'indexvendedores'])->name('users.indexvendedores');
        Route::get('/users/getConfVendedor', [UserController::class, 'getConfVendedor'])->name('users.getConfVendedor');
        Route::put('/users/vendedor/{vendedor}', [UserController::class, 'updateVendedor'])->name('users.updateVendedor');
        Route::put('/users/cliente/{cliente}', [UserController::class, 'updateCliente'])->name('users.updateCliente');

        Route::resource('users', UserController::class);

        Route::get('/cc', [CuentasclarasController::class, 'index'])->name('cc.index');
        Route::get('/cc/validaEntrega', [CuentasclarasController::class, 'validaEntrega'])->name('cc.validaEntrega');
        Route::get('/cc/updateCuentasclaras', [CuentasclarasController::class, 'updateCuentasclaras'])->name('cc.updateCuentasclaras');

        Route::get('/militantes/getCuentasClaras', [MilitanteController::class, 'getCuentasClaras'])->name('militantes.getCuentasClaras');
        Route::get('/militantes/indexAuditoria', [MilitanteController::class, 'indexAuditoria'])->name('militantes.indexAuditoria');
        Route::get('/militantes/getHistorial', [MilitanteController::class, 'getHistorial'])->name('militantes.getHistorial');
        Route::get('/militantes/updateEstado/{militante}', [MilitanteController::class, 'updateEstado'])->name('militantes.updateEstado');
        Route::get('/militantes/ccupdate/{militante}', [MilitanteController::class, 'ccupdate'])->name('militantes.ccupdate');
        Route::get('/militantes/registroHistorial', [MilitanteController::class, 'registroHistorial'])->name('militantes.registroHistorial');

        Route::resource('nominados', NominadoController::class);

        Route::get('/examens/getExamen', [ExamenController::class, 'getExamen'])->name('examens.getExamen');

        Route::get('/examens/evaluar', [ExamenController::class, 'evaluar'])->name('examens.evaluar');
        Route::get('/examens/putExamen', [ExamenController::class, 'putExamen'])->name('examens.putExamen');

        Route::resource('examens', ExamenController::class);

        Route::get('/paises/departamentos', [PaisController::class, 'departamentos']);
        Route::get('/paises/ciudades', [PaisController::class, 'ciudades']);

        Route::resource('paises', PaisController::class);
        Route::resource('roles', RoleController::class);

        Route::get('/master/getDashboard', [MasterController::class, 'getDashboard'])->name('master.getDashboard');
        Route::get('/master/getEmpresas', [MasterController::class, 'getEmpresas'])->name('master.getEmpresas');
        Route::get('/master/getRoles', [MasterController::class, 'getRoles'])->name('master.getRoles');
        Route::get('/master/index', [MasterController::class, 'rolesIndex'])->name('master.index');
        Route::get('/master/rolesshow', [MasterController::class, 'rolesshow'])->name('master.rolesshow');
        Route::get('/master/rolesedit', [MasterController::class, 'rolesedit'])->name('master.rolesedit');
        Route::get('/master/rolesupdate ', [MasterController::class, 'rolesupdate'])->name('master.rolesupdate');
        Route::get('/master/paises', [MasterController::class, 'paisesIndex'])->name('master.paises');
        Route::get('/master/empresas', [MasterController::class, 'empresasIndex'])->name('master.empresas');
        Route::get('/master/corporaciones', [MasterController::class, 'corporacionesIndex'])->name('master.corporaciones');
        Route::get('/master/etnias', [MasterController::class, 'etniasIndex'])->name('master.etnias');
        Route::get('/master/tiposdoc', [MasterController::class, 'tipodocIndex'])->name('master.tiposdoc');
        Route::get('/master/parametros', [MasterController::class, 'parametrosIndex'])->name('master.parametros');
        Route::get('/master/generos', [MasterController::class, 'generosIndex'])->name('master.generos');
        Route::get('/master/import', [MasterController::class, 'importIndex'])->name('master.import');
        Route::get('/master/niveleducativo', [MasterController::class, 'niveleducativoIndex'])->name('master.niveleducativo');
        Route::get('/master/tiposhistorial', [MasterController::class, 'tipohistorialIndex'])->name('master.tiposhistorial');
        Route::get('/master/tiposarchivos', [MasterController::class, 'tipoarchivosIndex'])->name('master.tiposarchivos');
        Route::get('/master/tiposdocsearch', [MasterController::class, 'tipodocSearch'])->name('master.tiposdocsearch');
        Route::get('/master/getTipohistorial', [MasterController::class, 'getTipohistorial'])->name('master.getTipohistorial');

        Route::get('/enviar', [EmailController::class, 'send'])->name('enviar');
        Route::get('/detalleventa', [EmailController::class, 'send'])->name('detalleventa');

//});




