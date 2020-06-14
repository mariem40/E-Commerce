<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {     Schema::disableForeignKeyConstraints();
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
		$table->string('code')->unique();	
        $table->string('name');
		$table->string('image');
        $table->double('price');
		$table->integer('stock');
        $table->text('detail');
		
            $table->timestamps();
			$table->softDeletes();
			/*$table->unsignedBigInteger('category_id');
        $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('restrict')
            ->onUpdate('restrict');*/
			$table->unsignedBigInteger('marque_id')->nullable();
			 $table->foreign('marque_id')
            ->references('id')
            ->on('marques')
            ->onDelete('restrict')
            ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
