<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Client') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('admin.clients.update', $client) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required
                            value="{{ $client->name }}" autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="occupation" :value="__('occupation')" />
                        <x-text-input id="occupation" class="block mt-1 w-full" type="text" name="occupation"
                            value="{{ $client->occupation }}" required autofocus autocomplete="occupation" />
                        <x-input-error :messages="$errors->get('occupation')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="avatar" :value="__('avatar')" />
                        <img src="{{ Storage::url($client->avatar) }}" alt=""
                            class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <x-text-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" autofocus
                            autocomplete="avatar" />
                        <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                    </div>

                    {{-- <div class="mt-4">
                        <x-input-label for="logo" :value="__('logo')" />
                        <img src="{{ Storage::url($client->logo) }}" alt=""
                            class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <x-text-input id="logo" class="block mt-1 w-full" type="file" name="logo" autofocus
                            autocomplete="logo" />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                    </div> --}}

                    <div x-data="{ open: false }" class="mt-4">
                        <x-input-label for="logo" :value="__('Logo')" />

                        <!-- Gambar logo kecil yang bisa diklik -->
                        <img src="{{ Storage::url($client->logo) }}" alt="Logo"
                            class="rounded-2xl object-cover w-[90px] h-[90px] cursor-pointer" @click="open = true">

                        <!-- Input file -->
                        <x-text-input id="logo" class="block mt-1 w-full" type="file" name="logo" autofocus
                            autocomplete="logo" />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />

                        <!-- Modal yang muncul saat open = true -->
                        <div x-show="open" x-transition
                            class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
                            <div @click.away="open = false" class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6">
                                <h2 class="text-xl font-bold mb-4">Logo Preview</h2>

                                <!-- Gambar besar -->
                                <img src="{{ Storage::url($client->logo) }}" alt="Full Logo"
                                    class="max-w-full h-auto mb-6">

                                <div class="flex justify-end">
                                    <button @click="open = false"
                                        class="py-2 px-4 bg-gray-300 rounded-full hover:bg-gray-400">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Client
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
