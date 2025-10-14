@extends('layouts.app')

@section('title', 'News & Updates')

@section('content')
<div x-data="{ showCreate: false, showEdit: false, showView: false, selectedNews: null }" class="flex flex-wrap min-h-screen bg-gray-50">

    {{-- ✅ Sidebar --}}
    @include('components.admin-sidebar')

    {{-- ✅ Main Content --}}
    <div class="flex-1 p-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-semibold text-blue-800">News & Updates</h2>
                <button @click="showCreate = true" 
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Add News
                </button>
            </div>

            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                <thead>
            <tr class="bg-gray-100 text-gray-700">
                <th class="px-4 py-2 text-left">Image</th>
                <th class="px-4 py-2 text-left">Title</th>
                <th class="px-4 py-2 text-left">Date</th>
                <th class="px-4 py-2 text-center">Actions</th>
            </tr>
        </thead>
                <tbody>
                    @forelse($news as $item)
                        <tr class="border-t hover:bg-gray-50 transition">
                            <td class="px-4 py-2">{{ $item->title }}</td>
                            <td class="px-4 py-2">{{ $item->created_at->format('M d, Y') }}</td>
                            <td class="px-4 py-2 text-center flex justify-center items-center gap-3">
                                {{-- 👁️ View --}}
                                <button @click="selectedNews = {{ $item }}, showView = true" 
                                        class="text-blue-600 hover:text-blue-800 font-medium">
                                    👁️ View
                                </button>
                                {{-- ✏️ Edit --}}
                                <button @click="selectedNews = {{ $item }}, showEdit = true" 
                                        class="text-yellow-500 hover:text-yellow-600 font-medium">
                                    ✏️ Edit
                                </button>
                                {{-- 🗑️ Delete --}}
                                <form action="{{ route('admin.news.destroy', $item->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Delete this news?');" 
                                      class="inline-block">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-800 font-medium">
                                        🗑️ Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-gray-500 italic">
                                No news yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- ✅ CREATE MODAL --}}
    <div x-show="showCreate" 
         class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6" @click.away="showCreate = false">
            <h3 class="text-xl font-semibold mb-4 text-blue-800">Add News</h3>
            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="block text-gray-700 font-medium">Title</label>
                    <input type="text" name="title" class="w-full border rounded p-2" required>
                </div>
                <div class="mb-3">
                    <label class="block text-gray-700 font-medium">Description</label>
                    <textarea name="description" rows="3" class="w-full border rounded p-2" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="block text-gray-700 font-medium">Upload Image</label>
                    <input type="file" name="image" class="w-full border rounded p-2">
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" @click="showCreate = false" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
                </div>
            </form>
        </div>
    </div>

    {{-- ✅ EDIT MODAL --}}
    <div x-show="showEdit" 
         class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6" @click.away="showEdit = false">
            <h3 class="text-xl font-semibold mb-4 text-yellow-600">Edit News</h3>
            <form :action="`/admin/news/${selectedNews.id}`" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="block text-gray-700 font-medium">Title</label>
                    <input type="text" name="title" x-model="selectedNews.title" class="w-full border rounded p-2" required>
                </div>
                <div class="mb-3">
                    <label class="block text-gray-700 font-medium">Description</label>
                    <textarea name="description" rows="3" x-model="selectedNews.description" class="w-full border rounded p-2" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="block text-gray-700 font-medium">Replace Image</label>
                    <input type="file" name="image" class="w-full border rounded p-2">
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" @click="showEdit = false" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Update</button>
                </div>
            </form>
        </div>
    </div>

    {{-- ✅ VIEW MODAL --}}
    <div x-show="showView" 
         class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6" @click.away="showView = false">
            <h3 class="text-xl font-semibold mb-2 text-blue-800" x-text="selectedNews?.title"></h3>
            <p class="text-gray-600 text-sm mb-4" x-text="new Date(selectedNews?.created_at).toLocaleDateString()"></p>
            <p class="text-gray-700 mb-4" x-text="selectedNews?.description"></p>
            <img :src="selectedNews?.image ? '/storage/news/' + selectedNews.image : ''" 
                 alt="News Image" 
                 class="rounded-lg shadow-md w-full object-cover mb-4" 
                 x-show="selectedNews?.image">
            <div class="flex justify-end">
                <button @click="showView = false" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- ✅ SweetAlert Notifications --}}
@if(session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        });
    </script>
@endif
