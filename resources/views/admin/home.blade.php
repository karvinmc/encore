@extends('layouts.admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
        <h2 class="text-2xl font-bold">2500</h2>
        <p class="text-gray-600">Welcome</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
        <h2 class="text-2xl font-bold">123.50</h2>
        <p class="text-gray-600">Average Time</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
        <h2 class="text-2xl font-bold">1,805</h2>
        <p class="text-gray-600">Collections</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
        <h2 class="text-2xl font-bold">54</h2>
        <p class="text-gray-600">Comments</p>
    </div>
</div>

<div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-black text-white p-4 rounded-lg text-center">
        <h2 class="text-2xl font-bold">35k</h2>
        <p>Friends</p>
    </div>
    <div class="bg-blue-400 text-white p-4 rounded-lg text-center">
        <h2 class="text-2xl font-bold">584k</h2>
        <p>Followers</p>
    </div>
    <div class="bg-blue-300 text-white p-4 rounded-lg text-center">
        <h2 class="text-2xl font-bold">978</h2>
        <p>Tweets</p>
    </div>
    <div class="bg-red-500 text-white p-4 rounded-lg text-center">
        <h2 class="text-2xl font-bold">450</h2>
        <p>Followers</p>
    </div>
</div>
@endsection
