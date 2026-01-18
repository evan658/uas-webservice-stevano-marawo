public function up(): void
{
    Schema::table('lagus', function (Blueprint $table) {
        $table->integer('tahun')->after('penyanyi');
    });
}

public function down(): void
{
    Schema::table('lagus', function (Blueprint $table) {
        $table->dropColumn('tahun');
    });
}
