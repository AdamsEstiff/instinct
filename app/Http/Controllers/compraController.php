<?php

namespace App\Http\Controllers;
use App\User;
use App\ModelsSave\Publicacion;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class compraController extends Controller
{
    //funcion para restar productos
    public function comprar (Request $request)

    {

        $compradorID = $request->input('compradorID');
        $productoID = $request->input('productoID');
        $cantidad = $request->input('cantidad');
        $cantidad= $cantidad-1;
        $comprador=User::find($compradorID);
        $exito="Felicidades usted a concluido con el proceso de compra excitosamente, gracias por preferirnos";
        try{
            $compra= Publicacion::find($productoID);
            $compra->cantidad=$cantidad;

            $compra->save();
            return view('user.buyFinish',[
                "messaje"=>$exito,
                "producto"=>$compra,
                "comprador"=>$comprador
            ]);
        }catch (Exception $e){
            return  view('user.buyFinish',[
                "messaje"=> $e
            ]);
        }
    }

}
