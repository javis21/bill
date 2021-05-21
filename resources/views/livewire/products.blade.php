
  <div>
    <form action="" method="POST">
        @csrf
     <div class="card">
            

        <div class="card-header">
            client
        </div>


       



        <div class="relative inline-block text-left ">
            <td>
                
            </td>
           
        </div>
        <div class="card-body">
            <div class="flex-auto flex space-x-3 ">
                @if (!is_null($students))
        <div class=" ">
            <td>
                <select name=""
                        wire:model="selectedClass"
                        class="inline-flex  flex-wrap justify-center  rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                    <option value="">-- choose client --</option>
                    @foreach ($students as $client)
                         <option value="{{ $client->id }}">

                           
                            {{$client->name}} ---{{ $client->email }}
                      
                        </option>
                        @endforeach

                </select>
                 
            </td>
        </div>
        @endif

        

    </div>
    
</div> 
        <div class="card">
            <div class="card-header">
                Products
            </div>

            <div class="card-body">
                <table class="table" id="products_table">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                   
                        @foreach ($orderProducts as $index => $orderProduct)
                            <td>
                                <select name="orderProducts[{{$index}}][product_id]"
                                wire:model="orderProducts.{{$index}}.product_id"
                                        class="form-control">
                                    <option value="">-- choose product --</option>
                                    @foreach ($articles as $article)
                                         <option value="{{ $article->id}}">
                                      {{$article->name}}: {{$article->prix_vente}}Dt
                                        </option>
                                        
                                    @endforeach
                                  
                                </select>
                            </td>
                            
                            <td>
                                <input type="number"
                                       name="orderProducts[{{$index}}][quantity]"
                                       class="focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-10" 
                                       wire:model="orderProducts.{{$index}}.quantity"/>
                                       {{$index }}  
                            </td>
                            <td>
                                <a href="#" wire:click.prevent="removeProduct({{$index}})">Delete</a>
                               
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>

                <div class="row">
                    <div class="col-md-12">
                        <button class="py-2 px-4 font-semibold rounded-lg shadow-md text-white bg-green-500 hover:bg-green-700"
                            wire:click.prevent="addProduct">+ Add Another Product</button>
                    </div>
                </div>
            </div>
        </div>
        <br />

        <div class="card">
            <div class="card-header">
                payment
            </div>
            <div class="card-body">
            <div class=" 	 text-2xl leading-7  relative	font-bold">
                $89.00
              </div>

            </div>
        </div>
        <div>
            <input class="btn btn-primary " type="submit" value="BUY">
        </div>
    </form>
</div>

