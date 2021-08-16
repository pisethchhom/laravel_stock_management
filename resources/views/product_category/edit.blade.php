<x-app-layout>
    <x-slot name="header">
        <a class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" 
            href="{{ route('product-category.index') }}">
            Back
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="w-full max-w-xl" method="POST" action="{{ route('product-category.update', $productCategory) }}">
                        @csrf
                        @method('PUT')
                        <div class="md:flex md:items-center mb-6">
                          <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="product-category-name">
                              Category Name
                            </label>
                          </div>
                          <div class="md:w-2/3">
                            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                                id="product-category-name" type="text" name="name" placeholder="Category name" 
                                value="{{ $productCategory->name }}" required>
                          </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="product-category-description">
                                Description
                              </label>
                            </div>
                            <div class="md:w-2/3">
                              <textarea class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                              id="product-category-description" name="description" placeholder="More information">{{ $productCategory->description }}</textarea>
                            </div>
                          </div>
                        <div class="md:flex md:items-center">
                          <div class="md:w-1/3"></div>
                          <div class="md:w-2/3">
                            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" 
                                type="submit">
                              Update
                            </button>
                          </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
