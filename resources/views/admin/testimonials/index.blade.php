<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Testimonials') }}
            </h2>
            <a href="{{ route('admin.testimonials.create') }}"
                class="font-bold py-2 px-4 bg-indigo-700 text-white rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 space-y-6">
                @forelse($testimonials as $item)
                    {{-- Wrap per item dengan Alpine.js state --}}
                    <div x-data="{ open: false }" class="border rounded-lg p-4 flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <img src="{{ Storage::url($item->thumbnail) }}" alt="{{ $item->client->name }}"
                                class="w-20 h-20 rounded-xl object-cover">
                            <div>
                                <h3 class="text-indigo-900 text-lg font-bold">{{ $item->client->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $item->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.testimonials.edit', $item->id) }}"
                                class="py-2 px-4 bg-indigo-700 text-white rounded-full text-sm font-semibold">
                                Edit
                            </a>
                            {{-- View via modal --}}
                            <button @click="open = true"
                                class="py-2 px-4 bg-green-600 text-white rounded-full text-sm font-semibold">
                                View
                            </button>
                            {{-- Delete --}}
                            <form action="{{ route('admin.testimonials.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="py-2 px-4 bg-red-600 text-white rounded-full text-sm font-semibold"
                                    onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </div>

                        {{-- Modal --}}
                        <div x-show="open" x-transition
                            class="fixed inset-0 bg-black bg-opacity-20 flex items-center justify-center z-10">
                            <div @click.away="open = false" class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6">
                                <h2 class="text-xl font-bold mb-4">{{ $item->client->name }}</h2>
                                <p class="text-gray-700 mb-6">{{ $item->testimonial_text }}</p>
                                <div class="flex justify-end">
                                    <button @click="open = false"
                                        class="py-2 px-4 bg-gray-300 rounded-full hover:bg-gray-400">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-gray-500 py-10">
                        <h3 class="text-lg">No Testimonials Found</h3>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
