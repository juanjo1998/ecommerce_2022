<div x-data="dropDown()">
    {{-- nav --}}
    <nav class="text-white flex items-center max-w-6xl mx-auto px-1 py-2 justify-between md:justify-start">

        {{-- menu bar --}}   
        <div class="order-last md:order-first mx-2">
           <a x-on:click="show()" class="cursor-pointer">
                <i class="fa-solid fa-bars text-4xl hover:text-yellow-300"></i>
           </a>
        </div>
    
        {{-- logo --}}
        <div class="mx-2">
            <a href="/">
                <i class="fa-brands fa-reddit text-4xl hover:text-yellow-300"></i>
            </a>
        </div>
    
        {{-- search --}}

        <div class="hidden md:block flex-1">        
            @livewire('search')
        </div>
        
    
        {{-- user --}}
    
        <div class="ml-3 relative hidden md:block">
            @auth
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">             
                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>                                           
                    </x-slot>
    
                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>
    
                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>
    
                        <div class="border-t border-gray-100"></div>
    
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
    
                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            @else
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <i class="
                        fa-solid fa-circle-user text-4xl cursor-pointer hover:text-yellow-300 transition duration-0 hover:duration-150"></i>
                    </x-slot>
    
                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>
            @endauth
        </div>
    
        {{-- cart --}}
        <div class="mx-3 md:block dropdown-cart-container">
            @livewire('dropdown-cart')       
        </div>
    </nav>
    
    {{--mega-menu container (background black hv-100) --}}
    <div class="bg-black bg-opacity-75 absolute w-full megamenu hidden z-30"
    :class="{'block':open,'hidden':!open}">
        
        {{-- megamenu (categories-subcategories-image) --}} {{-- menu pc --}}
        <div class="bg-white max-w-6xl mx-auto hidden md:block"
        x-on:click.away="close()">

            {{-- cols --}}
            <div class="grid grid-cols-4 relative">
                <ul class="bg-indigo-600">
                    @foreach ($categories as $category)                            
                        <li class="navigation-links hover:bg-yellow-300">
                            
                            <a href="" class="text-md text-white block px-2 py-2">
                                <span>
                                    {!!$category->icon!!}    
                                </span>      
                                {{$category->name}}
                            </a>                                                           
                            {{-- subcategories --}}

                            <div class="show-subcategories absolute top-0 right-0 w-3/4 h-full bg-black hidden">
                                <x-navigation-subcategories :category="$category"/>                                                  
                            </div>
                        </li>                                              
                    @endforeach
                </ul>   
                
                {{-- primera subcategoria fija --}}
                <div class="col-span-3">
                    <x-navigation-subcategories :category="$categories->first()"/>                                                  
                </div>
            </div>
           
        </div>

        {{-- menu mobile --}}
        
        <div class="bg-white h-full md:hidden">
            {{-- search --}}

            <div class="p-3">
                @livewire('search')
            </div>

            {{-- mobile categories --}}

            <ul>
                @foreach ($categories as $category)
                    <li class="hover:bg-yellow-300 border-b">
                                
                        <a href="" class="text-2xl block px-2 py-2">
                            <span>
                                {!!$category->icon!!}    
                            </span>      
                            {{$category->name}}
                        </a>                                                                                   
                    </li>  
                @endforeach
            </ul>

            {{-- user --}}

            <ul>
                {{-- mobile cart --}}

                @livewire('mobile-cart')

                @auth
                    <li class="bg-indigo-600 hover:bg-opacity-80 text-white">
                                        
                        <a href="{{route('profile.show')}}" class="text-2xl block px-2 py-2">
                            <span>
                                <i class="fas fa-user"></i>
                            </span>      
                            Perfil
                        </a>                                                                                   
                    </li>  

                    <li class="bg-black hover:bg-opacity-80 text-white">

                        <a href="{{route('logout')}}" 
                        class="text-2xl block px-2 py-2"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <span>
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </span>      
                        Cerrar Sesión
                        </a>      
                       
                        <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                            @csrf                                                   
                        </form>                                                                                                                        
                    </li>  

                    @else

                    <li class="bg-indigo-600 hover:bg-opacity-80 text-white">
                                        
                        <a href="{{route('login')}}" class="text-2xl block px-2 py-2">
                            <span>
                                <i class="fa-solid fa-fingerprint"></i>
                            </span>      
                            Iniciar Sesión
                        </a>                                                                                  
                    </li>
                    <li class="bg-black hover:bg-opacity-80 text-white">
                                        
                        <a href="{{route('register')}}" class="text-2xl block px-2 py-2">
                            <span>
                                <i class="fa-solid fa-address-card"></i>
                            </span>      
                            Registrate
                        </a>                                                                                  
                    </li>  
                @endauth                
            </ul>
        </div>
    </div>
</div>