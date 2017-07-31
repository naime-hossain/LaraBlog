<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SeedSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     DB::table('settings')->insert(
                        array(

    array('site_name' => 'Larablog',
        'site_slogan' => 'write like there is no rule',
        'site_subslogan' => 'write like there is no rule',
        'site_description' => 'write like there is no rule',
        'site_footer_text' => 'write like there is no rule',
        'site_cover_photo' => '31.jpg'),
   
                                   
                              
                        )
                        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       DB::table('settings')->delete();
    }
}
