<x-app-layout>   
    {{-- glider-js  css--}}
    @push('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.css" integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    @endpush

    <div class="container">   

         <h1>Cambio realizado por J2DEV</h1>

        @foreach ($categories as $category)            
            <section class="mb-10">
                {{-- categories --}}
                <h2 class="text-3xl uppercase text-black font-bold">
                    <a href="{{route('categories.show',$category)}}" class="hover:text-indigo-400 hover:underline">
                        {{$category->name}}
                    </a>
                </h2>
                
                <div class="mt-5">
                    {{-- productos por categoría --}}
                    @livewire('category-products',['category' => $category])
                </div>
            </section>        
        @endforeach
    </div>
    
    {{-- glider-js scripts --}}

    @push('scripts')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.js" integrity="sha512-tHimK/KZS+o34ZpPNOvb/bTHZb6ocWFXCtdGqAlWYUcz+BGHbNbHMKvEHUyFxgJhQcEO87yg5YqaJvyQgAEEtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            Livewire.on('glider-loadCategoryProducts',function(categoryId){
                new Glider(document.querySelector('.glider-'+categoryId), {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    draggable: true,
                    dots: '.glider'+categoryId+'~ .dots',
                    arrows: {
                        prev: '.glider'+categoryId+'~ .glider-prev',
                        next: '.glider'+categoryId+'~ .glider-next'
                    },                   

                    responsive: [
                        {
                            // screens greater than >= 640px
                            breakpoint: 640,
                            settings: {
                                // Set to `auto` and provide item width to adjust to viewport
                                slidesToShow: 2,
                                slidesToScroll: 2,
                            }
                        },{
                            // screens greater than >= 768px
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                            }
                        },{
                            // screens greater than >= 1024px
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 4,
                            }
                        },{
                            // screens greater than >= 1280px
                            breakpoint: 1280,
                            settings: {
                                slidesToShow: 5,
                                slidesToScroll: 5,
                            }
                        }
                    ]
                });
            })
        </script>
    @endpush


</x-app-layout>