<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Statistics') }}
            </h2>
            <a href="{{ route('admin.statistics.create') }}"
                class="font-bold py-2 px-4 bg-indigo-700 text-white rounded-full hover:bg-indigo-800 transition">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 space-y-5">

                @forelse ($statistics as $statistic)
                    <div
                        class="flex flex-col md:flex-row justify-between items-center bg-gray-50 p-4 rounded-lg shadow-sm">
                        <div class="flex items-center space-x-4 w-full md:w-96">
                            <img src="{{ Storage::url($statistic->icon) }}" alt="{{ $statistic->name }}"
                                class="w-[90px] h-[90px] rounded-2xl object-cover">
                            <h3 class="text-xl font-bold text-indigo-950">{{ $statistic->name }}</h3>
                        </div>

                        <div class="flex flex-col items-center text-right min-w-[150px]">
                            <span class="text-slate-500 text-sm">Date</span>
                            <span class="text-indigo-950 text-xl font-bold">
                                {{ $statistic->created_at->format('M, d, Y') }}
                            </span>
                        </div>


                        <div class="flex items-center space-x-3 mt-4 md:mt-0">
                            <a href="{{ route('admin.statistics.edit', $statistic->id) }}"
                                class="py-2 px-4 bg-indigo-700 text-white rounded-full hover:bg-indigo-800 transition">
                                Edit
                            </a>
                            <form action="{{ route('admin.statistics.destroy', $statistic->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this statistic?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="py-2 px-4 bg-red-700 text-white rounded-full hover:bg-red-800 transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="flex justify-center items-center">
                        <h3 class="text-gray-500 text-xl font-bold">No Statistics Found</h3>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
