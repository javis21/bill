<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\article;


class CrudArt extends Component
{
    public $articles,$code, $name, $famille, $desc,$prix_vente,$prix_achat, $Qte,  $article_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->articles = article::all();
        return view('livewire.crud-art');
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
        $this->code = '';
        $this->name = '';
        $this->famille = '';
        $this->desc = '';
       $this->prix_vente = '';
       $this->prix_achat = '';
       $this->Qte = '';

    }
    
    public function store()
    {
        $this->validate([
            'code' => 'required',
            'name' => 'required',
            'famille' => 'required',
           
            'prix_vente' => 'required',
            'Qte' => 'required',
        ]);
    
        article::updateOrCreate(['id' => $this->article_id], [
            'code' => $this->code,
            'name' => $this->name,
            'famille' => $this->famille,
            'desc' => $this->desc,
            'prix_vente' => $this->prix_vente,
            'prix_achat' => $this->prix_achat,
            'Qte' => $this->Qte,



        ]);

        session()->flash('message', $this->article_id ? 'article updated.' : 'article created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $article = article::findOrFail($id);
        $this->id = $id;
        $this->code = $article->code;
        $this->name = $article->name;
        $this->famille = $article->famille;
        $this->desc = $article->desc;
        $this->prix_vente = $article->prix_vente;
        $this->prix_achat = $article->prix_achat;
        $this->Qte = $article->Qte;

        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        article::find($id)->delete();
        session()->flash('message', 'article deleted.');
    }
}