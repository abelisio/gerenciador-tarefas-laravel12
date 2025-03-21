use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up()
{
Schema::table('tarefas', function (Blueprint $table) {
$table->renameColumn('status', 'situacao'); // Renomeia a coluna 'status' para 'situacao'
});
}

public function down()
{
Schema::table('tarefas', function (Blueprint $table) {
$table->renameColumn('situacao', 'status'); // Reverte a alteração
});
}
};