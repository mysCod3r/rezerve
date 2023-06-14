  <x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.menus.index')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Menu Index</a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded">
            <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
  <form method="POST" action="{{ route('admin.menus.update',$menu->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="sm:col-span-6">
      <label for="name" class="block text-sm font-medium text-gray-700" > Name </label>
      <div class="mt-1">
        <input type="text" id="name" name="name" value="{{ $menu->name }}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('description') border-red-400 @enderror" />
      </div>
      @error('name')
          <div class="text-sm text-red-400">{{ $message }}</div>
      @enderror
    </div>
    <div class="sm:col-span-6">
      <label for="image" class="block text-sm font-medium text-gray-700"> Image </label>
      <div>
         <img class="w-32 h-32" src="{{ Storage::url($menu->image) }}">
      </div>
      <div class="mt-1">
        <input type="file" id="image"  name="image" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('description') border-red-400 @enderror" />
      </div>
      @error('image')
          <div class="text-sm text-red-400">{{ $message }}</div>
      @enderror
    </div>
    <div class="sm:col-span-6">
      <label for="price" class="block text-sm font-medium text-gray-700"> Price </label>
      <div class="mt-1">
        <input type="number" min="0.00" max="10000.00" step="0.01" id="price" name="price" value="{{ $menu->price }}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('description') border-red-400 @enderror" />
      </div>
      @error('price')
          <div class="text-sm text-red-400">{{ $message }}</div>
      @enderror
    </div>
    <div class="sm:col-span-6 pt-5">
      <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
      <div class="mt-1">
        <textarea id="description" rows="3"  name="description" class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('description') border-red-400 @enderror">
          {{ $menu->description }}
        </textarea>
      </div>
      @error('description')
          <div class="text-sm text-red-400">{{ $message }}</div>
      @enderror
    </div>
    <div class="sm:col-span-6 pt-5">
      <label for="body" class="block text-sm font-medium text-gray-700">Categories</label>
      <div class="mt-1">
        <select id="categories" name="categories[]" class="from-multiselect block w-full mt-1" multiple>
          @foreach($categories as $category)
            <option value="{{ $category->id }}" @selected($menu->categories->contains($category))>{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="mt-6 p-4">
    <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">Update</button>
    </div>
  </form>
</div>

            </div>
         </div>
    </div>
</x-admin-layout>
