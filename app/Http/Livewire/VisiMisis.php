<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\VisiMisi;

class VisiMisis extends Component
{

    public $visimisi, $type, $description, $visimisi_id, $vision, $missions;
    public $visi;
    public $misi = [];

    public function mount() {
        $vision = VisiMisi::where('type', 'visi')->first();
        $missions = VisiMisi::where('type', 'misi')->get();
        $this->vision = $vision->description;
        $this->missions = $missions;
        for ($i=0; $i < sizeof($missions); $i++) { 
            $this->misi[$i]['id'] = $missions[$i]->id;
            $this->misi[$i]['description'] = $missions[$i]->description;
        }
        $this->visi = $this->vision;
    }

    public function render()
    {
        return view('livewire.visi-misi');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'visi' => 'required',
            'misi' => 'required',
        ]);
    }

    public function storeVisi() {
        // $this->validate([
        //     'visi' => 'required',
        // ]);
        VisiMisi::where('type', $this->type)->update([
            'description' => $this->visi,
        ]);
        session()->flash('message', 'Visi Berhasil Diubah.');

        // session()->flash('message', 'Visi Berhasil Diubah.');
        // $this->resetInputFields();
    }

    public function storeMisi($i, $id = null) {
        // $this->validate([
        //     'misi' => 'required',
        // ]);
        VisiMisi::updateOrCreate(['id' => $id], [
            'type' => 'misi',
            'description' => $this->misi[$i]['description'],
        ]);
        session()->flash('message', $id ? 'Misi Berhasil Diubah.' : 'Misi Berhasil Ditambahkan.');

        // session()->flash('message', 'Visi Berhasil Diubah.');
        // $this->resetInputFields();
    }

    public function addMisi() {
        array_push($this->misi, ['id' => null, 'description' => '']);
        // $this->misi->push(['id' => '', 'description' => '']);
        // dd($this->misi);
    }
}
