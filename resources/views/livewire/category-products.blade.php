<div wire:init="loadCategoryProducts">{{-- este metodo se ejecuta cuando cargue el html de este componente --}}
  @if (count($products))      
    <div class="glider-container">
      <ul class="glider-{{$category->id}}">
        @foreach ($products as $product)
          <li class="bg-white rounded-sm shadow {{$loop->last ? '' : 'sm:mr-4'}}">        
            <a href="">
              <article>
                  <figure class="mb-4">
                    <img class="h-48 w-full object-cover object-center" src="{{Storage::url($product->images->first()->url)}}">  
                  </figure>    
                  
                  <div class="text-center mb-2">
                    <x-simple-link/>
                  
                    <h1 class="mt-3">{{Str::limit($product->name,15)}}</h1>  
      
                    <p class="font-bold">COP {{$product->price}}</p>
                  </div>
              </article>          
            </a>
          </li>    
        @endforeach
      </ul>
    
     {{--  <button aria-label="Previous" class="glider-prev">«</button>
      <button aria-label="Next" class="glider-next">»</button>
      <div role="tablist" class="dots"></div> --}}
    </div>
  @else
   <div class="flex justify-center">
      <x-spinner/>
   </div>
  @endif
</div>