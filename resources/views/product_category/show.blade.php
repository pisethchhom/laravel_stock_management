<x-app-layout>
    <x-slot name="header">
        <a class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" 
            href="{{ route('product-category.index') }}">
            Back
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Product Category Name: {{ $productCategory->name }}
                    <p>{{ $productCategory->description }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
