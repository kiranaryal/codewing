<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('upload.json') }}" method="POST" enctype="multipart/form-data" class="flex flex-col space-y-6" >
        @csrf
        <input type="file" name="json_file" class="mx-auto" accept=".json">
        @if ($errors->any())
        <div class="text-red-700 mx-auto">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <button type="submit" class="bg-green-200 mx-auto p-3 rounded">Upload JSON File</button>
    </form>

</x-app-layout>
