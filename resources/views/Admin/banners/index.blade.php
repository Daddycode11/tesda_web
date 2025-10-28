@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100">

    <!-- Sidebar -->
    @include('components.admin-sidebar')

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <h2 class="text-2xl font-semibold mb-6">Manage Banners</h2>

        <!-- Alerts -->
        <div id="alert-container"></div>

        <!-- Upload Form -->
        <div class="bg-white shadow rounded p-6 mb-6">
            <form id="bannerForm" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col sm:flex-row items-center gap-4">
                    <input type="file" name="image" id="imageInput" class="border rounded p-2 w-full sm:w-auto" required>
                    <img id="preview" class="h-24 object-cover hidden border rounded" />
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                        Upload Banner
                    </button>
                </div>
                <p id="error-message" class="text-red-600 mt-2 hidden"></p>
            </form>
        </div>

        <!-- Existing Banners Grid -->
        <div id="bannerGrid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse($banners as $banner)
                <div class="bg-white shadow rounded overflow-hidden" id="banner-{{ $banner->id }}">
                    <img src="{{ asset('storage/' . $banner->image_path) }}" alt="Banner Image" class="w-full h-48 object-cover" loading="lazy">
                    <div class="p-4">
                        <p class="text-sm text-gray-600">Uploaded: {{ $banner->created_at->format('M d, Y H:i') }}</p>
                        <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" class="mt-2 delete-banner-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 col-span-full">No banners uploaded yet.</p>
            @endforelse
        </div>
    </div>
</div>

<script>
    // Live Image Preview
    document.getElementById('imageInput').addEventListener('change', function(){
        const [file] = this.files;
        if(file){
            const preview = document.getElementById('preview');
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
        }
    });

    // AJAX Banner Upload
    document.getElementById('bannerForm').addEventListener('submit', async function(e){
        e.preventDefault();
        const formData = new FormData(this);
        const errorMessage = document.getElementById('error-message');
        errorMessage.classList.add('hidden');
        errorMessage.textContent = '';

        try {
            const response = await fetch("{{ route('admin.banners.store') }}", {
                method: 'POST',
                body: formData,
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            });

            if(!response.ok){
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const data = await response.json();

            if(data.success){
                // Show success alert
                const alertContainer = document.getElementById('alert-container');
                alertContainer.innerHTML = `
                    <div id="alert-success" class="bg-green-100 text-green-800 p-3 rounded mb-4 flex justify-between items-center">
                        Banner uploaded successfully!
                        <button onclick="document.getElementById('alert-success').remove()" class="ml-2 font-bold">X</button>
                    </div>
                `;

                // Append new banner to grid
                const bannerGrid = document.getElementById('bannerGrid');
                const div = document.createElement('div');
                div.className = "bg-white shadow rounded overflow-hidden";
                div.id = `banner-${data.id}`;
                div.innerHTML = `
                    <img src="/storage/${data.path}" alt="Banner Image" class="w-full h-48 object-cover" loading="lazy">
                    <div class="p-4">
                        <p class="text-sm text-gray-600">Uploaded just now</p>
                        <form action="/admin/banners/${data.id}" method="POST" class="mt-2 delete-banner-form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </div>
                `;
                bannerGrid.prepend(div);

                // Reset form and preview
                document.getElementById('bannerForm').reset();
                document.getElementById('preview').classList.add('hidden');
            } else {
                if(data.errors && data.errors.image){
                    errorMessage.textContent = data.errors.image[0];
                    errorMessage.classList.remove('hidden');
                }
            }
        } catch (err) {
            console.error(err);
            alert('An error occurred while uploading the banner.');
        }
    });

    // AJAX Delete Banners
    document.addEventListener('submit', function(e){
        if(e.target.classList.contains('delete-banner-form')){
            e.preventDefault();
            if(confirm('Are you sure you want to delete this banner?')){
                fetch(e.target.action, {
                    method: 'POST',
                    body: new FormData(e.target),
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success){
                        const bannerDiv = e.target.closest('div[id^="banner-"]');
                        bannerDiv.remove();
                    } else {
                        alert('Failed to delete banner.');
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert('An error occurred while deleting the banner.');
                });
            }
        }
    });
</script>
