<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>{{$monument->title}}</title>
</head>

<body class="bg-gray-100 text-gray-800 font-sans">

    <!-- Include the small navbar component -->
    <x-navbar />
    <!-- resources/views/components/small-navbar.blade.php -->

    <x-smallnavbar type="edit" :id="$monument->id" />

    <!-- Main Content -->
    <x-edit-images :id="$monument->id" type="New" :images="$monument->newImages" title="Jauns" />

</body>

</html>