<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        {{-- fontawesome --}}
        <script src="https://kit.fontawesome.com/d99d3d68b5.js" crossorigin="anonymous"></script>

        {{-- flowbite css --}}
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        {{-- flowbite js --}}
        <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

        {{-- stack css --}}

        @stack('css')

    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-300">
            
            <!-- Page Heading -->
            <header class="bg-indigo-600 sticky top-0 z-50">              
                    {{-- navigation --}}
                    @livewire('navigation')    
            </header>

            <div class="main-slider container p-0">
                {{-- main slider --}}

                <x-main-slider/>
            </div>


            <!-- Page Content -->
            <main>
                {{ $slot }}               
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        {{-- scripts --}}
        <script>
            function dropDown(){
                return {
                    open:false,
                    show(){                                        

                        if (this.open) {
                            // Se cierra el menu
                            this.open = false;
                            document.getElementsByTagName('html')[0].style.overflow = 'auto';                         
                        }else{
                            // Se abre el menu
                            this.open = true;
                            document.getElementsByTagName('html')[0].style.overflow = 'hidden';
                        }
                    },
                    close(){
                        this.open = false
                        document.getElementsByTagName('html')[0].style.overflow = 'auto' 
                    }
                }
            }
        </script>     
        
        {{-- stack scripts --}}
        @stack('scripts')
    </body>
</html>
