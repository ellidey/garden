<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('role_id')->default(0);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('avatar');
            $table->rememberToken();
            $table->timestamps();
        });
        User::create(['name' => 'user','email' => 'user@user.user','password' =>
            Hash::make('password'), 'email_verified_at'=>'2022-01-02 17:04:58','avatar' =>
            'seeders/avatars/avatar-1.png','created_at' => now(),]);

        User::create(['name' => 'operator','email' => 'operator@operator.operator','password' =>
            Hash::make('password'), 'role_id' => 2, 'email_verified_at'=>'2022-01-02 17:04:58','avatar' =>
            'seeders/avatars/avatar-2.png','created_at' => now(),]);

        User::create(['name' => 'admin','email' => 'admin@admin.admin','password' =>
            Hash::make('password'), 'role_id' => 1, 'email_verified_at'=>'2022-01-02 17:04:58','avatar' =>
            'seeders/avatars/avatar-3.png','created_at' => now(),]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
