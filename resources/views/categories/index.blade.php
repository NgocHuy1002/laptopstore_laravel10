@extends('layouts.app')

@section('title', 'Home Category List')

@section('contents')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Home Category List</h1>
        <a href="{{ route('admin/categories/create') }}" class="inline-flex items-center px-4 py-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 text-white font-medium rounded-md text-sm dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Add Category
        </a>
    </div>
    <hr class="my-4" />

    @if(Session::has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    
    <div class="divide-y divide-gray-200 dark:divide-gray-700">
        @foreach ($categories as $category)
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <div>
                        <h5 class="text-lg font-semibold">{{ $category->name }}</h5>
                        <p class="text-sm text-gray-600">{{ $category->description }}</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('admin/categories/show', $category->id) }}" class="text-sm bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded mr-2">Details</a>
                    <a href="{{ route('admin/categories/edit', $category->id)}}" class="text-sm bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded mr-2">Edit</a>
                    <form action="{{ route('admin/categories/destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-6">
        {{ $categories->links() }}
    </div>
</div>
@endsection