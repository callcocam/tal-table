<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Tall\Table\Traits;

use Tall\Orm\Traits\Kill;

/**
 * Class Column.
 */
trait TColumn
{
    use Kill;
   
    /**
     * @var string
     */
    protected $name;
   
    /**
     * @var bool
     */
    protected $searchable = true;

    /**
     * @var bool
     */
    protected $sortable = true;


    /**
     * Column constructor.
     *
     * @param string $attribute
     */
    public function __construct(string $attribute)
    {
      $this->name = $attribute;
    }

    /**
     * @param string $attribute
     *
     * @return TColumn
     */
    public static function make(string $attribute): TColumn
    {
        return new static($$attribute);
    }

    /**
     * @return string
     */
    public function getAttribute(): string
    {
        return $this->name;
    }
    /**
     * @return string
     */
    public function __get($name)
    {
        return $this->{$name};
    }
}
