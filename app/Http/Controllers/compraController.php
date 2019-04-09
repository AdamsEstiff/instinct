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
        $comprador=User::find($compradorID);
        $exito="Felicidades usted a concluido con el proceso de compra excitosamente, gracias por preferirnos";
        try{
            $compra= Publicacion::find($productoID);
            if($compra->cantidad<1){
                return  view('user.buyFinish',[
                    "producto"=>$compra,
                    "comprador"=>$comprador,
                    "info"=>"Que mal :(",
                    "buyresult"=>"No funcio su compra de ",
                    "color"=>"alert-danger",
                    "messaje"=>  "El numero de produtos es insuficiente"
                ]);
            }
            else{
                $cantidad=$compra->cantidad-1;
                $compra->cantidad=$cantidad;
                $compra->save();
                return view('user.buyFinish',[
                    "messaje"=>$exito,
                    "producto"=>$compra,
                    "info"=>"En hora buena!",
                    "buyresult"=>"Es un exito su compra de ",
                    "color"=>"alert-success",
                    "comprador"=>$comprador
                ]);
            }

        }catch (Exception $e){
            return  view('user.buyFinish',[
                "producto"=>$compra,
                "comprador"=>$comprador,
                "info"=>"Que mal! :(",
                "buyresult"=>"No funcio su compra de ",
                "messaje"=> $e
            ]);
        }
    }

}
