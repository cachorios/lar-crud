<?php

namespace Cachorios\CrudLar\DataTable;

use Livewire\Attributes\Url;
use Livewire\WithPagination;

trait WithLarCrud
{
    use WithPagination;


    /**
     * Paginacion
     */
    public $porPagina = 5;

    public function mountWithPerPagePagination()
    {
        $this->porPagina = session()->get('porPagina', $this->porPagina);
    }
    public function updatedPorPagina($value)
    {
        session()->put('porPagina', $value);
    }
    public function applyPagination($query)
    {
        return $query->paginate($this->porPagina);
    }

    /**
     * Ordenamiento
     */
    #[Url(as:'s')]
    public $sorts = [];
    public function sortBy($field)
    {
        if( ! isset($this->sorts[$field])) return $this->sorts[$field] = 'asc';
        if( $this->sorts[$field] === 'asc') return $this->sorts[$field] = 'desc';

        unset($this->sorts[$field]);

    }
    public function applySorting($query)
    {
        foreach ($this->sorts as $field => $direction) {
            $query->orderBy($field, $direction);
        }

        return $query;
    }

    /**
     * Filtros
     */
    #[Url(as:'f')]
    public $filters = [
        'search' => ''
    ];
    public $showFilters = false;

    public function resetFilters(){

        $this->resetPage();
        $this->reset('filters');
    }


    public function toggleShowFilters(){
        if(trait_exists(WithCachedRows::class))
            $this->useCachedRows();

        $this->showFilters = !$this->showFilters;
    }
    public function updatedFilters(){
        $this->resetPage();
    }

    public function mergeFilters($filters = [] ){
        $this->filters = array_merge($this->filters, $filters);
    }
}
