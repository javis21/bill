<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\fourn;


class CrudFourn extends Component
{
    public $fourns, $name, $email, $mobile,$adresse,$website, $fourn_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->fourns = fourn::all();
        return view('livewire.crud-fourn');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->name = '';
        $this->email = '';
        $this->mobile = '';
        $this->adresse = '';
       $this->website = '';

    }
    
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'adresse' => 'required',
            'website' => 'required',
        ]);
    
        fourn::updateOrCreate(['id' => $this->fourn_id], [
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'adresse' => $this->adresse,
            'website' => $this->website,

        ]);

        session()->flash('message', $this->fourn_id ? 'fourn updated.' : 'fourn created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $fourn = fourn::findOrFail($id);
        $this->id = $id;
        $this->name = $fourn->name;
        $this->email = $fourn->email;
        $this->mobile = $fourn->mobile;
        $this->adresse = $fourn->adresse;
        $this->website = $fourn->website;
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        fourn::find($id)->delete();
        session()->flash('message', 'fourn deleted.');
    }
}