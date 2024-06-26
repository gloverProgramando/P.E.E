<?php

use App\Http\Controllers\DocumentManagement;
use App\Http\Controllers\enterpriseManagement;
use App\Http\Controllers\Estancia;
use App\Http\Controllers\FormatsManagement;
use App\Http\Controllers\pdfgenerator;
use App\Http\Controllers\PeriodManagement;
use App\Http\Controllers\UsersManagement;
use App\Http\Controllers\profile;
use App\Models\Academic_adviser;
use App\Models\Area_Knowledge;
use App\Models\carrier;
use App\Models\Degree;
use App\Models\Enterprise;
use App\Models\Enterprise_adviser;
use App\Models\Format;
use App\Models\Gender;
use App\Models\Period;
use App\Models\Process;
use App\Models\Size_Enterprise;
use App\Models\Society;
use App\Models\StatusDoc;
use App\Models\Student;
use App\Models\Type_Process;
use App\Models\TypeDocument;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

/*
------------------------------------------
|                 login                  |
------------------------------------------
*/

    Route::get('/inicio_admin',function(){
        $date = Carbon::now();
        $year = $date->year;
        $month = $date->month;
        if ($month >= 1 && $month <= 4) {
            $quarter = '01';
        } elseif ($month >= 5 && $month <= 8) {
            $quarter = '02';
        } else {
            $quarter = '03';
        }
        $idp = $year . $quarter;
        $stadisticusers = User::count();
        $stadisticusersprocess = [];
        $stadisticusersprocessnow = [];
        $typeprocess = Type_Process::all();
        for ($i = 1; $i <= 5; $i++) {
            $stadisticusersprocess[$i] = Process::where('IdTypeProcess', $i)->count();
            $stadisticusersprocessnow[$i] = Process::where('IdTypeProcess', $i)->where('IdPeriod',$idp)->count();
        }
        return view('users.admin.inicio-admin', compact('stadisticusers', 'stadisticusersprocess', 'typeprocess','stadisticusersprocessnow'));
    })->name('admin')->middleware('admin');

    Route::get('/inicio_alumno', function(){
        $procesos=Type_Process::all();
        $formatos=Format::where('Name','Guía de uso de la plataforma')->first();
        return view('users.alumno.inicio-alumno',compact('procesos','formatos'));
    })->name('alumno')->middleware('alumno');

    Route::get('/inicio_empresa',function(){
        $date = Carbon::now();
        $year = $date->year;
        $month = $date->month;
        if ($month >= 1 && $month <= 4) {
            $quarter = '01';
        } elseif ($month >= 5 && $month <= 8) {
            $quarter = '02';
        } else {
            $quarter = '03';
        }
        $idp = $year . $quarter;
        $stadisticusers = User::count();
        $stadisticusersprocess = [];
        $stadisticusersprocessnow = [];
        $typeprocess = Type_Process::all();
        for ($i = 1; $i <= 5; $i++) {
            $stadisticusersprocess[$i] = Process::where('IdTypeProcess', $i)->where('IdEnterpriseAdviser',Auth::user()->email)->count();
            $stadisticusersprocessnow[$i] = Process::where('IdTypeProcess', $i)->where('IdPeriod',$idp)->where('IdEnterpriseAdviser',Auth::user()->email)->count();
        }
        return view('users.empresa.inicio-empresa', compact('stadisticusers', 'stadisticusersprocess', 'typeprocess','stadisticusersprocessnow'));
    })->name('empresa')->middleware('empresa');

    Route::get('/inicio_asesor-academico',function(){
        $date = Carbon::now();
        $year = $date->year;
        $month = $date->month;
        if ($month >= 1 && $month <= 4) {
            $quarter = '01';
        } elseif ($month >= 5 && $month <= 8) {
            $quarter = '02';
        } else {
            $quarter = '03';
        }
        $idp = $year . $quarter;
        $stadisticusers = User::count();
        $stadisticusersprocess = [];
        $stadisticusersprocessnow = [];
        $typeprocess = Type_Process::all();
        for ($i = 1; $i <= 5; $i++) {
            $stadisticusersprocess[$i] = Process::where('IdTypeProcess', $i)->where('IdAcademicAdvisor',Auth::user()->email)->count();
            $stadisticusersprocessnow[$i] = Process::where('IdTypeProcess', $i)->where('IdPeriod',$idp)->where('IdAcademicAdvisor',Auth::user()->email)->count();
        }
        return view('users.asesor-academico.asesoracademico', compact('stadisticusers', 'stadisticusersprocess', 'typeprocess','stadisticusersprocessnow'));
    })->name('asesor-academico')->middleware('asesoracademico');

/*
------------------------------------------
|              Functions                 |
------------------------------------------
*/

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/CreateNewUser', [UsersManagement::class, 'CreateUserIndividual'])
->name('CreateUserIn')
->middleware('admin');

Route::get('/DeleteUserS/{user}', [UsersManagement::class, 'DeleteUser'])
->name('DeleteUserS')
->middleware('admin');

Route::post('/CreateNewUsers', [UsersManagement::class, 'CreateUsersMassive'])
->name('CreateUserMul')
->middleware('admin');

Route::get('/CreateNewPeriod', [PeriodManagement::class, 'CreatePeriod'])
->name('CreatePeriod')
->middleware('admin');

Route::get('/UpdatePeriod/{id}/{subperiod}', [PeriodManagement::class, 'ChangeStatusSubPeriod'])
->name('UpdatePeriod')
->middleware('admin');

Route::post('/UpdateUser', [UsersManagement::class, 'UpdateDataUser'])
->name('UpdateUser')
->middleware('admin');

Route::post('/UpdateFormat/{id}', [FormatsManagement::class, 'UpdateFormat'])
->name('UpdateFormat')
->middleware('admin');

Route::get('/documentsStudent/{IdProcess}/{users}',[DocumentManagement::class, 'findAllDocuments'])
->name('SearchDocumentStudent');

Route::get('/changestatus/{doc}/{status}/{user}',[DocumentManagement::class, 'ChangeStatus'])
->name('changestatus')
->middleware('admin');

Route::post('/savecomment/{doc}',[DocumentManagement::class, 'DoObservation'])
->name('savecomment');

Route::post('/modifiedenterprise/{rcf}',[enterpriseManagement::class, 'UpdateEnterprise'])
->name('UpdateEnterprise')
->middleware('admin');

Route::post('/Newmassiveenterprise',[enterpriseManagement::class, 'UploadEnterpriseMassive'])
->name('NewEnterprise')
->middleware('admin');

Route::get('/descargar_formato/{id}', [Estancia::class, 'DownloadFormat'])
->name('Descargar_formato');

Route::post('/SingupPeriod/{PageProcess}', [Estancia::class, 'SignupPeriod'])
->name('SingupPeriod')
->middleware('alumno');

Route::post('/UploadDocument/{PageProcess}/{format}',[Estancia::class, 'UploadDocument'])
->name('UploadDocument')
->middleware('alumno');

Route::get('/cancelDocument/{pageprocess}/{IdDoc}',[Estancia::class, 'CancelDocument'])
->name('cancelDocument')
->middleware('alumno');

Route::get('/seeDocument/{NameFile}',[Estancia::class, 'SeeDocument'])
->name('SeeDocument');

Route::post('/updatedata',[profile::class, 'UpdateDataUser'])
->name('updatedataprofile');

Route::post('/updatepassword', [profile::class, 'ChangePassword'])
->name('updatepassword');

/*
------------------------------------------
|             Pdf controller             |
------------------------------------------
*/

Route::post('/pdfgenerate', [pdfgenerator::class, 'generatepdfregister'])
->name('pdfgenerateced');

Route::post('/pdfgeneratedef', [pdfgenerator::class, 'generatepdfdefinition'])
->name('generatepdfdef');

/*
------------------------------------------
|             Redirections               |
------------------------------------------
*/

Route::get('/ListUser', [UsersManagement::class, 'SeeAllUsers'])
->name('SeeAllUsersRoute')
->middleware('admin');

Route::get('/ListFormats',  function(){
    $formatos=Format::all();
    return view('users.admin.formatmanagement',compact('formatos'));
})->name('formats')->middleware('admin');

Route::get('/ListPeriod',  function(){
    $periodos=Period::all();
    return view('users.admin.periodsmanagement',compact('periodos'));
})->name('periods')->middleware('admin');

Route::get('/ProcessStudents', function(){
    $processinfos = Process::all();
    $typeprocess = Type_Process::all();
    return view('users.admin.studentsprocess', compact('processinfos','typeprocess'));
})->name('processinfo')
->middleware('admin');

Route::get('/ProcessStudentsAcademic', function(){
    $processinfos = Process::where('IdAcademicAdvisor', Auth::user()->email)->get();
    $typeprocess = Type_Process::all();
    return view('users.admin.studentsprocess', compact('processinfos','typeprocess'));
})->name('processinfoAcademic')
->middleware('asesoracademico');

Route::get('/ProcessStudentsEnteprise', function(){
    $processinfos = Process::where('IdEnterpriseAdviser', Auth::user()->email)->get();
    $typeprocess = Type_Process::all();
    return view('users.admin.studentsprocess', compact('processinfos','typeprocess'));
})->name('processinfoEnterprise')
->middleware('empresa');


Route::get('/EnterpriseManagement', function(){
    $enterprises = Enterprise::all();
    $sizes = Size_Enterprise::all();
    $society = Society::all();
    return view('users.admin.enterpriseManagement',compact('enterprises', 'sizes', 'society'));
})->name('EnterpriseManagement');

Route::get('/documentos_proceso/{IdProcess}', function($IdProcess){
    $formatos=TypeDocument::all();
    $proceso=Type_Process::find($IdProcess);
    $enterprise=Enterprise::all();
    $enterpriseadvisers=Enterprise_adviser::all();
    $academicadvisers=Academic_adviser::all();
    $ProcesoAlumno=Process::where('IdProcess',Auth::user()->email . $IdProcess)->where('IdTypeProcess',$IdProcess)->first();
    $DocumentosAlumno=DB::table('document')
    ->join('detail_document', 'document.IdDocuments', "=", 'detail_document.IdDoc')
    ->join('process', 'process.IdProcess', "=", "detail_document.IdPro")
    ->where('IdTypeProcess', $IdProcess)
    ->where('IdPro', Auth::user()->email . $IdProcess)
    ->where('deleted_at', null)
    ->get();
    $statusDoc=StatusDoc::all();
    if($ProcesoAlumno==true){
        $processperiod = Period::find($ProcesoAlumno->IdPeriod);
        return view('users.alumno.documentos',compact('formatos','proceso','ProcesoAlumno','DocumentosAlumno','statusDoc','processperiod','enterprise','academicadvisers','enterpriseadvisers'));
    } else{
        $processperiod = Null;
        return view('users.alumno.documentos',compact('formatos','proceso','DocumentosAlumno','processperiod','enterprise','academicadvisers','enterpriseadvisers'));
    }
})->name('documentos_alumno')->middleware('alumno');

Route::get('/perfil', function(){
    $userdata = User::find(auth()->user()->email);
    $studentdata = Student::find($userdata->email);
    $enterprise = Enterprise_adviser::find($userdata->email);
    $academic = Academic_adviser::find($userdata->email);
    $carrier = carrier::all();
    $Degree = Degree::all();
    $Genre = Gender::all();
    $enterprises = Enterprise::all();
    $Knowledge = Area_Knowledge::all();
    return view('users.perfil', compact('userdata','studentdata','Degree','Genre','Knowledge','enterprises','enterprise','academic','carrier'));
})
->name('perfil');

Route::get('/testemail', function(){
    return view('email.emaildocument');
})->name('email');

Route::get('/cd/{process}', function($processIdType){
    $datauser = User::find(Auth::user()->email);
    $datastudent = Student::find($datauser->email);
    $carriers = carrier::all();
    $Degree = Degree::all();
    $Size = Size_Enterprise::all();
    $process = Process::where('IdTypeProcess',$processIdType)->where('users',$datauser->email)->get()->first();
    $dataenterpriseco = Enterprise_adviser::find($process->IdEnterpriseAdviser);
    $dataacademicco = Academic_adviser::find($process->IdAcademicAdvisor);
    $dataenterprise = Enterprise::find($dataenterpriseco->IdEnterprise);
    if(empty($process->toarray())){
        Alert::Error('denegado','no has dado de alta tu proceso');
        return redirect('/documentos_proceso/'.$processIdType);
    }
    return view('plantillas.alumno.ceduladeregistro', compact('datauser','datastudent','carriers','process','dataenterpriseco','dataacademicco','dataenterprise','Degree','Size'));
})->name('testcd');

Route::get('/cd2/{process}', function($processIdType){
    $lugar = "Cancun, Quintana Roo";
    $periodos = Type_Process::where('IdProcess', $processIdType)->get()->first();
    $fecha = Carbon::now()->format('d-m-Y');
    return view('plantillas.alumno.definiciondeproyecto', compact('fecha','periodos','lugar'));
})->name('testcd2');