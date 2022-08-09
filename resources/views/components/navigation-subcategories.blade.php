@props(['category'])

<div class="grid grid-cols-4 bg-indigo-800">
    <div class="col-span-1">
        <ul class="text-white">
          @foreach ($category->subcategories as $subcategory)
              <li class="hover:bg-yellow-300">
                <a class="px-2 py-2 block" href="">{{Str::limit($subcategory->name,15)}}</a>
              </li>
          @endforeach                  
        </ul>     
    </div>           

    <div class="col-span-3">
        <img class="w-full object-cover object-center h-64" src="{{Storage::url($category->image)}}">
    </div>
</div>      