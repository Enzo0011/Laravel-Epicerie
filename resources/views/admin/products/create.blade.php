@extends('layouts.app')

@section('content')
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <div class="mb-4 p-2">
            <h1 class="text-2xl font-medium mb-1">Create a product</h1>
            <a href="{{ route('admin.products.index') }}">
                <button class="btn btn-primary mx-1">Go back</button>
            </a>
        </div>
        <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
            <div class="flex flex-col mb-4 p-4">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your product name"
                           class="form-control"
                           value="{{ old('name') }}">
                    @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="sr-only">Description</label>
                    <textarea name="description" id="description" cols="30" rows="4"
                              placeholder="Your product description"
                              class="form-control">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <select class="form-control" name="category">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="price" class="sr-only">Price</label>
                    <input type="text" name="price" id="price" placeholder="Your product price"
                           class="form-control"
                           value="{{ old('price') }}">
                    @error('price')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="stock" class="sr-only">Stock</label>
                    <input type="text" name="stock" id="stock" placeholder="Your product stock"
                           class="form-control"
                           value="{{ old('stock') }}">
                    @error('stock')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="image" class="sr-only">Product image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary mx-1">Create
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
