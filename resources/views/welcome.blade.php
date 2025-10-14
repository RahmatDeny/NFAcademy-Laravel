<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Genre, Author & Books</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-50 to-slate-100 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 py-12">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Data Genres, Authors & Books</h1>
        </div>

        <!-- Main Container - Vertical -->
        <div class="space-y-8 mb-8">
            
            <!-- Genres Section -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4">
                    <h2 class="text-2xl font-bold text-white">Genres</h2>
                </div>
                
                <!-- Per Page Selector -->
                <div class="bg-gray-50 px-6 py-3 border-b border-gray-200 flex justify-between items-center">
                    <span class="text-sm text-gray-600" id="genreInfo">Showing 1 to 10 of 30 results</span>
                    <div class="flex items-center gap-2">
                        <label class="text-sm text-gray-600">Per page:</label>
                        <select id="genrePerPage" class="border border-orange-500 rounded px-3 py-2 text-sm font-medium cursor-pointer hover:bg-orange-50">
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="all">All</option>
                        </select>
                    </div>
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
                        <tbody id="genreTable" class="divide-y divide-gray-200">
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Controls -->
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex justify-end gap-2">
                    <button id="genrePrevBtn" class="px-3 py-2 rounded border border-gray-300 text-sm font-medium hover:bg-gray-100 disabled:opacity-50">←</button>
                    <div id="genrePageBtns" class="flex gap-1">
                    </div>
                    <button id="genreNextBtn" class="px-3 py-2 rounded border border-gray-300 text-sm font-medium hover:bg-gray-100 disabled:opacity-50">→</button>
                </div>
            </div>

            <!-- Authors Section -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 px-6 py-4">
                    <h2 class="text-2xl font-bold text-white">Authors</h2>
                </div>
                
                <!-- Per Page Selector -->
                <div class="bg-gray-50 px-6 py-3 border-b border-gray-200 flex justify-between items-center">
                    <span class="text-sm text-gray-600" id="authorInfo">Showing 1 to 10 of 30 results</span>
                    <div class="flex items-center gap-2">
                        <label class="text-sm text-gray-600">Per page:</label>
                        <select id="authorPerPage" class="border border-orange-500 rounded px-3 py-2 text-sm font-medium cursor-pointer hover:bg-orange-50">
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="all">All</option>
                        </select>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 w-12">No</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Nama</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Bio</th>
                            </tr>
                        </thead>
                        <tbody id="authorTable" class="divide-y divide-gray-200">
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Controls -->
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex justify-end gap-2">
                    <button id="authorPrevBtn" class="px-3 py-2 rounded border border-gray-300 text-sm font-medium hover:bg-gray-100 disabled:opacity-50">←</button>
                    <div id="authorPageBtns" class="flex gap-1">
                    </div>
                    <button id="authorNextBtn" class="px-3 py-2 rounded border border-gray-300 text-sm font-medium hover:bg-gray-100 disabled:opacity-50">→</button>
                </div>
            </div>

            <!-- Books Section -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 px-6 py-4">
                    <h2 class="text-2xl font-bold text-white">Books</h2>
                </div>
                
                <!-- Per Page Selector -->
                <div class="bg-gray-50 px-6 py-3 border-b border-gray-200 flex justify-between items-center">
                    <span class="text-sm text-gray-600" id="bookInfo">Showing 1 to 10 of 30 results</span>
                    <div class="flex items-center gap-2">
                        <label class="text-sm text-gray-600">Per page:</label>
                        <select id="bookPerPage" class="border border-orange-500 rounded px-3 py-2 text-sm font-medium cursor-pointer hover:bg-orange-50">
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="all">All</option>
                        </select>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 w-12">No</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Title</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Author</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Genre</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Price</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Stock</th>
                            </tr>
                        </thead>
                        <tbody id="bookTable" class="divide-y divide-gray-200">
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Controls -->
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex justify-end gap-2">
                    <button id="bookPrevBtn" class="px-3 py-2 rounded border border-gray-300 text-sm font-medium hover:bg-gray-100 disabled:opacity-50">←</button>
                    <div id="bookPageBtns" class="flex gap-1">
                    </div>
                    <button id="bookNextBtn" class="px-3 py-2 rounded border border-gray-300 text-sm font-medium hover:bg-gray-100 disabled:opacity-50">→</button>
                </div>
            </div>

        </div>
    </div>

    <script>
        // Data dari database - dikirim oleh controller
        const sampleGenres = @json($genres);
        const sampleAuthors = @json($authors);
        const sampleBooks = @json($books);

        class Paginator {
            constructor(data, tableId, perPageSelectId, infoId, prevBtnId, nextBtnId, pageBtnsId, dataType) {
                this.allData = data;
                this.currentPage = 1;
                this.perPage = 10;
                this.tableId = tableId;
                this.perPageSelectId = perPageSelectId;
                this.infoId = infoId;
                this.prevBtnId = prevBtnId;
                this.nextBtnId = nextBtnId;
                this.pageBtnsId = pageBtnsId;
                this.dataType = dataType;
                
                this.init();
            }

            init() {
                this.setupListeners();
                this.render();
            }

            setupListeners() {
                document.getElementById(this.perPageSelectId).addEventListener('change', (e) => {
                    const value = e.target.value;
                    if (value === 'all') {
                        this.perPage = this.allData.length;
                    } else {
                        this.perPage = parseInt(value);
                    }
                    this.currentPage = 1;
                    this.render();
                });

                document.getElementById(this.prevBtnId).addEventListener('click', () => {
                    if (this.currentPage > 1) {
                        this.currentPage--;
                        this.render();
                    }
                });

                document.getElementById(this.nextBtnId).addEventListener('click', () => {
                    if (this.currentPage < this.getTotalPages()) {
                        this.currentPage++;
                        this.render();
                    }
                });
            }

            getTotalPages() {
                return Math.ceil(this.allData.length / this.perPage);
            }

            getPaginatedData() {
                const start = (this.currentPage - 1) * this.perPage;
                const end = start + this.perPage;
                return this.allData.slice(start, end);
            }

            renderTable() {
                const table = document.getElementById(this.tableId);
                const data = this.getPaginatedData();
                const start = (this.currentPage - 1) * this.perPage;

                table.innerHTML = data.map((item, idx) => {
                    if (this.dataType === 'genre') {
                        return `
                            <tr class="hover:bg-blue-50 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-600 font-medium">${start + idx + 1}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">${item.name}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">${item.description || '-'}</td>
                            </tr>
                        `;
                    } else if (this.dataType === 'author') {
                        return `
                            <tr class="hover:bg-emerald-50 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-600 font-medium">${start + idx + 1}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">${item.name}</td>
                                <td class="px-6 py-4 text-sm text-gray-600 line-clamp-2">${item.bio || '-'}</td>
                            </tr>
                        `;
                    } else if (this.dataType === 'book') {
                        return `
                            <tr class="hover:bg-purple-50 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-600 font-medium">${start + idx + 1}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">${item.title}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">${item.author ? item.author.name : '-'}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">${item.genre ? item.genre.name : '-'}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">Rp ${parseInt(item.price).toLocaleString('id-ID')}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">${item.stock}</td>
                            </tr>
                        `;
                    }
                }).join('');

                if (data.length === 0) {
                    const colspan = this.dataType === 'genre' ? 3 : this.dataType === 'author' ? 3 : 6;
                    table.innerHTML = `
                        <tr>
                            <td colspan="${colspan}" class="px-6 py-8 text-center text-gray-500">
                                <span class="inline-block">Tidak ada data.</span>
                            </td>
                        </tr>
                    `;
                }
            }

            renderPagination() {
                const totalPages = this.getTotalPages();
                const pageBtnsContainer = document.getElementById(this.pageBtnsId);
                
                let html = '';
                for (let i = 1; i <= totalPages; i++) {
                    if (i === this.currentPage) {
                        html += `<button class="px-3 py-2 rounded bg-blue-500 text-white text-sm font-medium">${i}</button>`;
                    } else {
                        html += `<button class="px-3 py-2 rounded border border-gray-300 text-sm font-medium hover:bg-gray-100">${i}</button>`;
                    }
                }
                
                pageBtnsContainer.innerHTML = html;
                
                // Attach page change listeners
                pageBtnsContainer.querySelectorAll('button').forEach((btn, idx) => {
                    btn.addEventListener('click', () => {
                        this.currentPage = idx + 1;
                        this.render();
                    });
                });

                // Update prev/next buttons
                document.getElementById(this.prevBtnId).disabled = this.currentPage === 1;
                document.getElementById(this.nextBtnId).disabled = this.currentPage === totalPages;
            }

            updateInfo() {
                const totalPages = this.getTotalPages();
                const start = (this.currentPage - 1) * this.perPage + 1;
                const end = Math.min(this.currentPage * this.perPage, this.allData.length);
                
                document.getElementById(this.infoId).textContent = 
                    `Showing ${start} to ${end} of ${this.allData.length} results`;
            }

            render() {
                this.renderTable();
                this.renderPagination();
                this.updateInfo();
            }
        }

        // Initialize paginators
        const genrePaginator = new Paginator(
            sampleGenres,
            'genreTable',
            'genrePerPage',
            'genreInfo',
            'genrePrevBtn',
            'genreNextBtn',
            'genrePageBtns',
            'genre'
        );

        const authorPaginator = new Paginator(
            sampleAuthors,
            'authorTable',
            'authorPerPage',
            'authorInfo',
            'authorPrevBtn',
            'authorNextBtn',
            'authorPageBtns',
            'author'
        );

        const bookPaginator = new Paginator(
            sampleBooks,
            'bookTable',
            'bookPerPage',
            'bookInfo',
            'bookPrevBtn',
            'bookNextBtn',
            'bookPageBtns',
            'book'
        );
    </script>
</body>
</html>