<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {//konu yanlış yazmaktan ziyadı bak ilk migrations dosytası users tablosunu oluşturuyor, sen 5. dosyada yine o tabloyu oluşturuyorusn? hata sebebi bu
        //hata yok diosun konsolun hata kaynıyor
        //bak ne diyor users tablosu zaten var diyor already exists aşkım user olup diğerleri olunca napim
        //migrationların başında tarih olmasının sebebi o, en üstten başlar ekleyerek gider, eğer birinde hata alırsa durur diğerlerine geçmez, senin ilk 4 dosyanda hata yok ama 5. dosyan zaten var olan users tablonu olutşuruyor o yüzden hata veriyor diğerlerine geçmiyor
        //bak meseal burada da hata aldın.
        //senin user tablonda user_id diye bi sutn yok? id diye var, gidip orada user_id bağlamaya çalışmışsın
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('gender');
            $table->string('email');
            $table->string("password",80);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
