<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Tall\Table\Fields;

use Tall\Orm\Core\Table\Traits\TColumn;

use Illuminate\Support\Str;

/**
 * Class Column.
 */
class Column
{
    use TColumn;

    /**
     * Column constructor.
     *
     * @param string $label
     * @param string $attribute
     */
    public function __construct( string $label, string $attribute=null)
    {
      $this->name = $attribute ?? Str::snake($label);
      $this->label = $label;
    }
   
    /**
     * @param string $attribute
     *
     * @return mixed
     */
    public static function make( string $label,string $attribute=null)
    {
        return new static($label,$attribute);
    }

    
    /**
     * @param string $attribute
     *
     * @return mixed
     */
    public static function status( string $label='Status',string $attribute='status')
    {
        $column = new static($label,$attribute);
        
        $column->component('status');

        return $column;
    }

    /**
     * $actions array com as ações
     */
    public static function actions(array $actions,$label="Action",$attribute=null)
    {
        $column = new static($label,$attribute);

        $column->sortable = false;
        $column->searchable = false;

        $column->actions = collect($actions)->map(function($column){
            $column->sortable = false;
            $column->searchable = false;
            $column->attributes['class'] = 'flex items-center space-x-2';
            return $column;
        })->toArray();

        return $column;
    }

}
