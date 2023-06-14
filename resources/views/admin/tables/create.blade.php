<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.tables.index')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Table Index</a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded">
            <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
  <form method="POST" action="{{ route('admin.tables.store') }}">
    @csrf
    <div class="sm:col-span-6">
      <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
      <div class="mt-1">
        <input type="text" id="name" name="name" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
      </div>
      @error('name')
          <div class="text-sm text-red-400">{{ $message }}</div>
      @enderror
    </div>
    <div class="sm:col-span-6">
      <label for="guest_number" class="block text-sm font-medium text-gray-700"> Guest Number </label>
      <div class="mt-1">
        <input type="number" id="guest_number" name="guest_number" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
      </div>
      @error('guest_number')
          <div class="text-sm text-red-400">{{ $message }}</div>
      @enderror
    </div>
    <div class="sm:col-span-6 pt-5">
      <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
      <div class="mt-1">
        <select id="status" name="status" class="from-multiselect block w-full mt-1" mutliple>
          @foreach(App\Enums\TableStatus::cases() as $status)
          <option value= "{{ $status->value }}">{{ $status->name }}</option>
          @endforeach
        </select>
      </div>
      @error('status')
          <div class="text-sm text-red-400">{{ $message }}</div>
      @enderror
    </div>
    <div class="sm:col-span-6 pt-5">
      <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
      <div class="mt-1">
        <select id="location" name="location" class="from-multiselect block w-full mt-1" mutliple>
        @foreach(App\Enums\TableLocation::cases() as $location)
          <option value= "{{ $location->value }}">{{ $location->name }}</option>
          @endforeach
        </select>
      </div>
      @error('location')
          <div class="text-sm text-red-400">{{ $message }}</div>
      @enderror
    </div>
    
    <div class="mt-6 p-4">
    <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">Store</button>
    </div>
  </form>
</div>

            </div>
         </div>
    </div>
</x-admin-layout>
