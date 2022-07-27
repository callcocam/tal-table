<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Table\Fields\Traits;

trait WithLivewire 
{
    protected $livewire;

    
    public function select($livewire="table-edit-component")
    {
        $this->livewire($livewire,"table::livewire.select");

        return $this;
    }
    
    public function native($livewire="table-edit-component")
    {
        $this->livewire($livewire,"table::livewire.select-native");

        return $this;
    }
    
    public function status($livewire="table-edit-component")
    {
        $this->livewire($livewire,"table::livewire.select-status");

        return $this;
    }

    public function radio($livewire="table-edit-component")
    {
        $this->livewire($livewire,"table::livewire.radio");
        
        return $this;
    }

    public function livewire($livewire = "table-edit-component", $view="table::livewire.text")
    {
        $this->view($view);

        $this->livewire = $livewire;
        
        return $this;
    }

    public function isLivewire()
    {
        return $this->livewire;
    }
}
