<div class="container mx-auto px-4">
    <h2 class="text-2xl font-semibold my-6 text-center">{{$title}}</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        @foreach ($images as $image)
        <div class="bg-white p-4 rounded-lg shadow-md flex flex-col items-center justify-between">
            <div class="w-3/4 h-48 flex justify-center items-center">
                <img alt="bilde" src="{{ asset('storage/' . $image->path) }}" class="object-cover h-full w-full shadow">
            </div>
            <form method="POST" action="{{ route('images.destroyOld', ['image_id' => $image->id]) }}" class="w-full flex justify-center items-center mt-4">
                @csrf
                @method('POST')
                <button type="submit" class="bg-amber-400 text-white py-2 px-3 rounded center w-20 hover:bg-red-700">Dzēst</button>
            </form>
        </div>
        @endforeach
    </div>
</div>

<form action="{{ route('images.store' . $type, ['monument_id' => $id]) }}" method="POST" enctype="multipart/form-data" class="mb-3 bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto">
    @csrf
    @method('POST')
    <div class="mb-4">
        <input type="file" name="image" class="w-full p-2 border border-gray-300 rounded-lg">
    </div>
    <div class="flex justify-end">
        <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Pievienot bildi</button>
    </div>
</form>