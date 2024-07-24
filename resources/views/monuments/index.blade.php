<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pieminekļi</title>
    @vite('resources/css/app.css')

</head>

<body class="bg-gray-100 text-gray-800 font-sans">

    <x-navbar />

    <div class="container mx-auto px-4">
        <button id="toggle-form" class="bg-orange-500 text-white py-2 px-4 rounded hover:bg-orange-700 mb-6">Slēpt meklēšanu</button>

        <form id="search-form" method="GET" action="{{ route('monuments.index') }}" class="bg-white p-6 block rounded-lg shadow-md mb-6">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="title" class="block font-semibold mb-1">Nosaukums</label>
                    <input type="text" id="title" name="title" value="{{ request('title') }}" class="w-full p-2 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label for="state" class="block font-semibold mb-1">Pilsēta vai pagasts</label>
                    <input type="text" id="state" name="state" value="{{ request('state') }}" class="w-full p-2 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label for="location" class="block font-semibold mb-1">Atrašanās vieta</label>
                    <input type="text" id="location" name="location" value="{{ request('location') }}" class="w-full p-2 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label for="person" class="block font-semibold mb-1">Iesaistītās personas</label>
                    <input type="text" id="person" name="person" value="{{ request('person') }}" class="w-full p-2 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label for="number" class="block font-semibold mb-1">Objekta numurs</label>
                    <input type="text" id="number" name="number" value="{{ request('number') }}" class="w-full p-2 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label for="type" class="block font-semibold mb-1">Tips</label>
                    <select name="type" id="type" class="w-full p-2 border border-gray-300 rounded-lg">
                        <option value="">Izvēlieties tipu...</option>
                        @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if ($type->id == request()->query('type')) selected @endif>{{ $type->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex space-x-4">
                <button type="submit" class="bg-orange-500 text-white py-2 px-4 rounded hover:bg-orange-700">Meklēt</button>
                <button type="submit" name="clear" value="1" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-700">Notīrīt izvēli</button>
            </div>
        </form>
        @if($monuments->isEmpty())
        <h3 class="text-3xl">Neviens objekts netika atrasts!</h3>
        @endif
        @foreach ($monuments as $monument)
        <div class="bg-white p-5 rounded-lg shadow-md mb-5 flex items-start">
            <img src="{{  $monument->coverPath() }}" alt="bilde" class="object-cover h-40 w-40 shadow-md mr-6">

            <div>
                <h2 class="text-2xl font-semibold mb-2">
                    <a href="{{ route('monuments.show', $monument->id) }}" class="text-orange-500 hover:underline">{{ $monument->title }}</a>
                </h2>
                <div class="flex flex-row items-center space-x-72">
                    <div>
                        <label class="font-semibold">Numurs:</label>
                        <span>{{ $monument->id }}</span>
                    </div>
                    <div>
                        <label class="font-semibold">Iesaistītās personas:</label>
                        <span>{{ $monument->people }}</span>
                    </div>
                </div>
                <div class="flex flex-row items-center space-x-2">
                    <label class="font-semibold">Tips:</label>
                    @foreach ($monument->types as $type)
                    <span>{{ $type->title }},</span>
                    @endforeach
                </div>
                <div class="flex flex-row items-center space-x-2">
                    <label class="font-semibold">Piilsēta vai pagasts:</label>
                    <span>{{ $monument->state }}</span>
                </div>
                <div class="flex flex-row items-center space-x-2">
                    <label class="font-semibold">Atrašanās vieta:</label>
                    <span>{{ $monument->location }}</span>
                </div>
            </div>
        </div>
        @endforeach
        <div class="my-6">
            {{ $monuments->links() }}
        </div>
    </div>
    <script src="{{ asset('js/index.js') }}"></script>
</body>

</html>