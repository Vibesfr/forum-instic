@extends('layouts.app')

@section('title', 'Create')

@section('content')
    <form method="POST" action="{{ route('questions.store') }}" enctype="multipart/form-data" >
        @csrf

        <div class="max-w-2xl mx-auto">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Titre</label>
            <div class="relative mb-6">
                <input name="title" value="{{ old('title') }}"  id="title" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 -500-500" placeholder="Le titre de la question">
            </div>

            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
            <div class="relative mb-6">
                <textarea name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 -500-500" placeholder="La description de la question">{{ old('description') }}</textarea>
            </div>

            <label for="content" class="block mb-2 text-sm font-medium text-gray-900">Contenu</label>
            <div class="relative mb-6">
                <textarea name="content" id="content" rows="10" cols="50" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 -500-500" placeholder="Le contenu de la question">{{ old('content') }}</textarea>
            </div>

            <input type="submit" name="valider" value="Valider" class="w-full border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
       </div>
    </form>
@endsection

