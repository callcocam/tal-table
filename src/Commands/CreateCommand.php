<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/

namespace Tall\Table\Commands;

use Illuminate\Console\Command;

class CreateCommand extends Command
{
   
    protected $signature = 'tall:table {--template= : nome para o component de table}';

    protected $description = 'Make a new table component.';

    protected $tableName = 'ListComponent';

     /**
     * @throws Exception
     */
    public function handle(): void
    {
       
    }
}
