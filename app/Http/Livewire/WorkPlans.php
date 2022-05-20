<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\WorkPlan;

class WorkPlans extends Component
{

    use WithFileUploads;

    public $workplan, $title, $description, $icon, $workplan_id;
    public $oldIcon;
    public $isEditMode = false;

    public function render()
    {
        $this->data = WorkPlan::latest()->get();
        return view('livewire.work-plan');
    }

    public function resetInputFields(){
        $this->title = '';
        $this->description = '';
        $this->icon = '';
        $this->workplan_id = '';
        $this->oldIcon = '';
        $this->isEditMode = false;
    }

    public function updatedIcon()
    {
        $this->validate([
            'icon' => 'image|max:1024',
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'title' => 'required',
            'description' => 'required',
        ]);
    }

    public function store() {
        if ($this->isEditMode) {
            $dataValid = $this->validate([
                'title' => 'required',
                'description' => 'required',
                // 'icon' => 'required|image'
            ]);
        } else {
            $dataValid = $this->validate([
                'title' => 'required',
                'description' => 'required',
                'icon' => 'required|image'
            ]);
        }

        // if ($this->isEditMode) {
        if ($this->icon) {
            $dataValid['icon'] = $this->icon->store('icons', 'public');
        } else {
            $dataValid['icon'] = $this->oldIcon;
        }
        // }
        // dd($dataValid['icon']);
        // return false;

        WorkPlan::updateOrCreate(['id' => $this->workplan_id], [
            'plan' => $this->title,
            'description' => $this->description,
            'icon' => $dataValid['icon']
        ]);

        session()->flash('message', $this->workplan_id ? 'Program Kerja Berhasil Ditambahkan.' : 'Program Kerja Berhasil Diubah.');
        $this->resetInputFields();
    }

    public function edit($id) {
        $workplan = WorkPlan::findOrFail($id);
        $this->icon = '';
        $this->workplan_id = $id;
        $this->title = $workplan->plan;
        $this->description = $workplan->description;
        $this->oldIcon = $workplan->icon;
        $this->isEditMode = true;
    }

    public function delete($id) {
        WorkPlan::find($id)->delete();
        session()->flash('message', 'Program Kerja Berhasil Dihapus');
    }
}

