<x-slot name="header">
    <h2 class="text-center">article manager</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <button wire:click="create()"
                class="bg-green-700 text-white font-bold py-2 px-4 rounded my-3">Create a article</button>
            @if($isModalOpen)
            @include('livewire.create-art')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">code</th>
                        <th class="px-4 py-2">name</th>
                        <th class="px-4 py-2">famille</th>
                        <th class="px-4 py-2">description</th>
                        <th class="px-4 py-2">prix_vente</th>
                        <th class="px-4 py-2">prix_achat</th>
                        <th class="px-4 py-2">Quantite</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td class="border px-4 py-2">{{ $article->id }}</td>
                        <td class="border px-4 py-2">{{ $article->code }}</td>
                        <td class="border px-4 py-2">{{ $article->name}}</td>
                        <td class="border px-4 py-2">{{ $article->famille}}</td>
                        <td class="border px-4 py-2">{{ $article->desc}}</td>
                        <td class="border px-4 py-2">{{ $article->prix_vente}}</td>
                        <td class="border px-4 py-2">{{ $article->prix_achat}}</td>
                        <td class="border px-4 py-2">{{ $article->Qte}}</td>
                        
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $article->id }})"
                                class="bg-blue-500  text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $article->id }})"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>