<?php

namespace App\Http\Livewire\Admin\Units;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Unit;
use Illuminate\Support\Facades\Validator;

class ListUnits extends AdminComponent
{
    public $state = [];

	public $unit;

	public $showEditModal = false;

	public $unitIdBeingRemoved = null;

	public $searchTerm = null;

    protected $queryString = ['searchTerm' => ['except' => '']];

    public $sortColumnName = 'created_at';

    public $sortDirection = 'desc';

	public function addNew()
	{
		$this->reset();

		$this->showEditModal = false;

		$this->dispatchBrowserEvent('show-form');
	}

	public function createUnit()
	{
		$validatedData = Validator::make($this->state, [
			'name' => 'required',
			'unit' => 'required',
		])->validate();

		Unit::create($validatedData);

		$this->dispatchBrowserEvent('hide-form', ['message' => 'Unit added successfully!']);
	}

	public function edit(Unit $unit)
	{
		$this->reset();

		$this->showEditModal = true;

		$this->unit = $unit;

		$this->state = $unit->toArray();

		$this->dispatchBrowserEvent('show-form');
	}

	public function updateUnit()
	{
		$validatedData = Validator::make($this->state, [
			'name' => 'required',
			'unit' => 'required',
		])->validate();

		$this->unit->update($validatedData);

		$this->dispatchBrowserEvent('hide-form', ['message' => 'Unit updated successfully!']);
	}

	public function confirmUnitRemoval($unitId)
	{
		$this->unitIdBeingRemoved = $unitId;

		$this->dispatchBrowserEvent('show-delete-modal');
	}

	public function deleteUnit()
	{
		$unit = Unit::findOrFail($this->unitIdBeingRemoved);

		$unit->delete();

		$this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Unit deleted successfully!']);
	}

    public function sortBy($columnName)
    {
        if ($this->sortColumnName === $columnName) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumnName = $columnName;
    }

    public function swapSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }

    public function render()
    {
    	$units = Unit::query()
    		->where('name', 'like', '%'.$this->searchTerm.'%')
    		->orWhere('unit', 'like', '%'.$this->searchTerm.'%')
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate(10);

        return view('livewire.admin.units.list-units', [
        	'units' => $units,
        ]);
    }
}
