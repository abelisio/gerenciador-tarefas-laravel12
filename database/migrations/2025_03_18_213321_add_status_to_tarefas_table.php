use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up()
{
Schema::table('tarefas', function (Blueprint $table) {
$table->enum('status', ['Em andamento', 'Concluída'])->default('Em andamento');
});
}

public function down()
{
Schema::table('tarefas', function (Blueprint $table) {
$table->dropColumn('status');
});
}
};