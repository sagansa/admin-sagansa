<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\FranchiseCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ListFranchiseCategories extends AdminComponent
{
	public $state = [];

	public $franchiseCategory;

	public $showEditModal = false;

	public $franchiseCategoryIdBeingRemoved = null;

	public function addNew()
	{
		$this->reset();

		$this->showEditModal = false;

		$this->dispatchBrowserEvent('show-form');
	}

	public function create()
	{
		$validatedData = Validator::make($this->state, [
			'name' => 'required',
		])->validate();

        $validatedData['user_id'] = Auth::id();
        $validatedData['status'] = 1;

		FranchiseCategory::create($validatedData);

		$this->dispatchBrowserEvent('hide-form', ['message' => 'Franchise Category added successfully!']);
	}

	public function edit(FranchiseCategory $franchiseCategory)
	{
		$this->reset();

		$this->showEditModal = true;

		$this->franchisecategory = $franchiseCategory;

		$this->state = $franchiseCategory->toArray();

		$this->dispatchBrowserEvent('show-form');
	}

	public function update()
	{
		$validatedData = Validator::make($this->state, [
			'name' => 'required',
		])->validate();

		$this->franchiseCategory->update($validatedData);

		$this->dispatchBrowserEvent('hide-form', ['message' => 'Franchise Category updated successfully!']);
	}

	public function confirmRemoval($franchiseCategoryId)
	{
		$this->franchiseCategoryIdBeingRemoved = $franchiseCategoryId;

		$this->dispatchBrowserEvent('show-delete-modal');
	}

	public function delete()
	{
		$franchiseCategory = FranchiseCategory::findOrFail($this->franchiseCategoryIdBeingRemoved);

		$franchiseCategory->delete();

		$this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Franchise Category deleted successfully!']);
	}

    public function render()
    {
        $franchiseCategories = FranchiseCategory::latest()->paginate(10);

        return view('livewire.admin.categories.list-franchise-categories', [
            'franchiseCategories' => $franchiseCategories,
        ]);
    }
}
