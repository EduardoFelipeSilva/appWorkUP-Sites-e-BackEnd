<?php

namespace App\Providers;

use App\Models\Area;
use App\Models\Post;
use App\Models\Vaga;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
{
    View::composer('*', function ($view) {
        $admin = Auth::guard('admin')->user();
        $empresa = Auth::guard('empresa')->user();
    
        if ($admin) {
            $totalDenuncias = DB::table('tb_denunciausuario')->count();
            $totalDenunciasEmpresa = DB::table('tb_denunciaempresa')->count();
            $totalDenunciasVagas = DB::table('tb_denunciavaga')->count();
            $totalDenunciasGeral = $totalDenuncias + $totalDenunciasEmpresa + $totalDenunciasVagas;
    
            $dadosDenuncias = [
                'totalDenuncias' => $totalDenuncias,
                'totalDenunciasEmpresa' => $totalDenunciasEmpresa,
                'totalDenunciasVagas' => $totalDenunciasVagas,
                'totalDenunciasGeral' => $totalDenunciasGeral,
            ];
    
            $view->with('admin', $admin)->with('dadosDenuncias', $dadosDenuncias);
        }

        if($empresa){
            $posts = Post::where('idEmpresa', $empresa->idEmpresa)->get();

            $denuncias = DB::table('tb_denunciausuario')->where('idEmpresa', $empresa->idEmpresa)->get();

            $vagas = Vaga::where('idEmpresa', $empresa->idEmpresa)
            ->with('modalidade', 'area', 'status')
            ->withCount('candidatos')
            ->orderBy('prazoVaga', 'asc')->get();
            
            
            $view->with('posts', $posts)->with('empresa', $empresa)->with('vagas', $vagas)->with('denuncias', $denuncias);
        }
    });
    
}

}
