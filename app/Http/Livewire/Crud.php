<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Student;


class Crud extends Component
{
    public $students, $name, $email, $mobile,$adresse,$website, $student_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->students = Student::all();
        return view('livewire.crud');
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
    
        Student::updateOrCreate(['id' => $this->student_id], [
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'adresse' => $this->adresse,
            'website' => $this->website,

        ]);

        session()->flash('message', $this->student_id ? 'Student updated.' : 'Student created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $this->id = $id;
        $this->name = $student->name;
        $this->email = $student->email;
        $this->mobile = $student->mobile;
        $this->adresse = $student->adresse;
        $this->website = $student->website;
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Student::find($id)->delete();
        session()->flash('message', 'Studen deleted.');
    }
}