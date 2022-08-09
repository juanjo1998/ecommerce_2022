@props(['bg' => 'bg-black','text' => 'simple link','color' => 'text-white'])

<a href="" class="inline-block rounded-md px-4 py-2 {{$bg}} hover:bg-opacity-60 {{$color}}">
    {{$text}}
</a>