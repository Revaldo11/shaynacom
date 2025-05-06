<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Statistics') }}
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

                <form x-data="{ loading: false }" @submit.prevent="loading = true; $el.submit()" method="POST"
                    action="{{ route('admin.statistics.update', $statistic) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required
                            value="{{ $statistic->name }}" autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="icon" :value="__('icon')" />
                        <img src="{{ Storage::url($statistic->icon) }}" alt=""
                            class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <x-text-input id="icon" class="block mt-1 w-full" type="file" name="icon" autofocus
                            autocomplete="icon" />
                        <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="goal" :value="__('goal')" />
                        <x-text-input id="goal" class="block mt-1 w-full" type="text" name="goal" required
                            value="{{ $statistic->goal }}" autofocus autocomplete="goal" />
                        <x-input-error :messages="$errors->get('goal')" class="mt-2" />
                    </div>

                    \
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" :disabled="loading"
                            class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full flex items-center gap-2">
                            <svg x-show="loading" class="animate-spin h-5 w-5 text-white"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                            </svg>
                            <span x-show="!loading">Update Statistic</span>
                            <span x-show="loading">Updating...</span>
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
