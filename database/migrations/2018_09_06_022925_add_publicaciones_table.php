Vegeta no lo es tanto
Y las entradas
??
Son enormes las entradas
Hahahaha
Ya mandé mi ración de memes
Hice algo productivo
fredo
mañana hay que programar la pagina
a que hora?
usted no recibe audio mio
Hola
Que paso?
On tas ?
Edificio nuevo
si
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPublicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicaciones', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id');
            $table->string('nombre_p');
            $table->string('imagen');
            $table->string('descripcion');
            $table->integer('precio');
            $table->integer('cantidad');
            $table->string('contacto');
            $table->string('dirrecion');
            $table->string('comment');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicaciones');
    }
}
