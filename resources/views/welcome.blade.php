<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Genre & Author</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-50 to-slate-100 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 py-12">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Data Genres dan Authors</h1>
            <!-- <p class="text-gray-600">Koleksi lengkap genre dan penulis favorit</p> -->
        </div>

        <!-- Main Container - Two Columns -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Genres Section - Left -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4">
                    <h2 class="text-2xl font-bold text-white">Genres (Top 5)</h2>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 w-12">No</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Nama Genre</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($genres as $index => $genre)
                                <tr class="hover:bg-blue-50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-600 font-medium">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $genre->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $genre->description }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-8 text-center text-gray-500">
                                        <span class="inline-block">Tidak ada data genre.</span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Authors Section - Right -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 px-6 py-4">
                    <h2 class="text-2xl font-bold text-white">Authors (Top 5)</h2>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 w-12">No</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Nama</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Photo</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Bio</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($authors as $index => $author)
                                <tr class="hover:bg-emerald-50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-600 font-medium">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $author->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600 truncate">{{ $author->photo }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600 line-clamp-2">{{ $author->bio }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                        <span class="inline-block">Tidak ada data author.</span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        
</body>
</html>