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
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();

            $table->string('campaign_name');
            $table->string('target_email');
            $table->string('email_subject');
            $table->longText('email_body');

            // Website where user will be redirected
            $table->string('redirect_url');

            // Unique token used inside phishing email
            $table->string('tracking_token')->unique();

            $table->enum('status', ['Draft', 'Sent'])->default('Draft');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
