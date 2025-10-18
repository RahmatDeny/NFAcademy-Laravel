@extends('layouts.app')

@section('title', 'Authors')

@section('content')
    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 px-6 py-4">
            <h2 class="text-2xl font-bold text-white">Authors</h2>
        </div>

        <!-- Per Page Selector, Info, and Add Button -->
        <div class="bg-gray-50 px-6 py-3 border-b border-gray-200 flex flex-wrap gap-4 items-center">
            <span class="text-sm text-gray-600" id="authorInfo">Showing 1 to 10 of 0 results</span>
            <div class="flex items-center gap-2 ml-auto">
                <label class="text-sm text-gray-600">Per page</label>
                <select id="authorPerPage" class="border border-orange-500 rounded px-3 py-2 text-sm font-medium cursor-pointer hover:bg-orange-50">
                    <option value="5">5</option>
                    <option value="10" selected>10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="all">All</option>
                </select>
                <button id="toggleAuthorCreate" class="ml-4 px-4 py-2 rounded-md bg-emerald-600 text-white text-sm font-semibold hover:bg-emerald-700">Tambah</button>
            </div>
        </div>

        <!-- Create Modal -->
        <div id="authorModal" class="fixed inset-0 hidden bg-black/40 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-lg">
                <div class="flex items-center justify-between px-6 py-3 border-b">
                    <h3 class="text-lg font-semibold">Tambah Author</h3>
                    <button id="closeAuthorModal" class="text-gray-500 hover:text-gray-700">✕</button>
                </div>
                <div class="px-6 py-4">
                    <form id="authorCreateForm" class="grid gap-4 md:grid-cols-2">
                        <div>
                            <label class="block text-sm text-gray-700 mb-1">Nama</label>
                            <input id="authorName" type="text" required class="w-full border rounded px-3 py-2" placeholder="Nama author">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-700 mb-1">Photo (URL)</label>
                            <input id="authorPhoto" type="text" required class="w-full border rounded px-3 py-2" placeholder="https://...">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm text-gray-700 mb-1">Bio</label>
                            <textarea id="authorBio" required class="w-full border rounded px-3 py-2" rows="3" placeholder="Bio singkat"></textarea>
                        </div>
                        <div class="md:col-span-2 flex items-center gap-2">
                            <button type="submit" class="px-4 py-2 rounded bg-emerald-600 text-white text-sm font-semibold hover:bg-emerald-700">Simpan</button>
                            <button type="button" id="cancelAuthorCreate" class="px-4 py-2 rounded border text-sm font-semibold hover:bg-gray-50">Batal</button>
                            <span id="authorCreateMsg" class="text-sm ml-2"></span>
                        </div>
                    </form>
                </div>
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
                <tbody id="authorTable" class="divide-y divide-gray-200"></tbody>
            </table>
        </div>

        <!-- Pagination Controls -->
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex justify-end gap-2">
            <button id="authorPrevBtn" class="px-3 py-2 rounded border border-gray-300 text-sm font-medium hover:bg-gray-100 disabled:opacity-50">←</button>
            <div id="authorPageBtns" class="flex gap-1"></div>
            <button id="authorNextBtn" class="px-3 py-2 rounded border border-gray-300 text-sm font-medium hover:bg-gray-100 disabled:opacity-50">→</button>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    const dataAuthors = @json($authors);

    class Paginator {
        constructor(data, tableId, perPageSelectId, infoId, prevBtnId, nextBtnId, pageBtnsId) {
            this.allData = data;
            this.currentPage = 1;
            this.perPage = 10;
            this.tableId = tableId;
            this.perPageSelectId = perPageSelectId;
            this.infoId = infoId;
            this.prevBtnId = prevBtnId;
            this.nextBtnId = nextBtnId;
            this.pageBtnsId = pageBtnsId;
            this.init();
        }
        init() { this.setupListeners(); this.render(); }
        setupListeners() {
            document.getElementById(this.perPageSelectId).addEventListener('change', (e) => {
                const value = e.target.value;
                this.perPage = value === 'all' ? this.allData.length : parseInt(value);
                this.currentPage = 1;
                this.render();
            });
            document.getElementById(this.prevBtnId).addEventListener('click', () => { if (this.currentPage > 1) { this.currentPage--; this.render(); }});
            document.getElementById(this.nextBtnId).addEventListener('click', () => { if (this.currentPage < this.getTotalPages()) { this.currentPage++; this.render(); }});
        }
        getTotalPages() { return Math.ceil(this.allData.length / this.perPage) || 1; }
        getPaginatedData() { const s=(this.currentPage-1)*this.perPage; return this.allData.slice(s, s+this.perPage); }
        renderTable() {
            const table = document.getElementById(this.tableId);
            const data = this.getPaginatedData();
            const start = (this.currentPage - 1) * this.perPage;
            table.innerHTML = data.map((item, idx) => `
                <tr class="hover:bg-emerald-50 transition-colors">
                    <td class="px-6 py-4 text-sm text-gray-600 font-medium">${start + idx + 1}</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">${item.name}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">${item.bio || '-'}</td>
                </tr>`).join('');
            if (!data.length) {
                table.innerHTML = `<tr><td colspan="3" class="px-6 py-8 text-center text-gray-500">Tidak ada data.</td></tr>`;
            }
        }
        renderPagination() {
            const total = this.getTotalPages();
            const el = document.getElementById(this.pageBtnsId);
            let html='';
            for (let i=1;i<=total;i++) {
                html += i===this.currentPage
                    ? `<button class=\"px-3 py-2 rounded bg-blue-500 text-white text-sm font-medium\">${i}</button>`
                    : `<button class=\"px-3 py-2 rounded border border-gray-300 text-sm font-medium hover:bg-gray-100\">${i}</button>`;
            }
            el.innerHTML = html;
            el.querySelectorAll('button').forEach((b, idx) => b.addEventListener('click', () => { this.currentPage = idx+1; this.render(); }));
            document.getElementById(this.prevBtnId).disabled = this.currentPage===1;
            document.getElementById(this.nextBtnId).disabled = this.currentPage===total;
        }
        updateInfo() {
            const start = (this.currentPage - 1) * this.perPage + 1;
            const end = Math.min(this.currentPage * this.perPage, this.allData.length);
            document.getElementById(this.infoId).textContent = `Showing ${this.allData.length ? start : 0} to ${this.allData.length ? end : 0} of ${this.allData.length} results`;
        }
        render(){ this.renderTable(); this.renderPagination(); this.updateInfo(); }
    }
    const authorPaginator = new Paginator(dataAuthors, 'authorTable', 'authorPerPage', 'authorInfo', 'authorPrevBtn', 'authorNextBtn', 'authorPageBtns');

    // Create handlers (Modal)
    const authorModal = document.getElementById('authorModal');
    const openAuthor = () => { authorModal.classList.remove('hidden'); };
    const closeAuthor = () => {
        authorModal.classList.add('hidden');
        document.getElementById('authorCreateForm').reset();
        document.getElementById('authorCreateMsg').textContent = '';
    };
    document.getElementById('toggleAuthorCreate').addEventListener('click', openAuthor);
    document.getElementById('closeAuthorModal').addEventListener('click', closeAuthor);
    document.getElementById('cancelAuthorCreate').addEventListener('click', closeAuthor);
    authorModal.addEventListener('click', (e) => { if (e.target === authorModal) closeAuthor(); });
    document.getElementById('authorCreateForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const payload = {
            name: document.getElementById('authorName').value.trim(),
            photo: document.getElementById('authorPhoto').value.trim(),
            bio:   document.getElementById('authorBio').value.trim(),
        };
        const msg = document.getElementById('authorCreateMsg');
        msg.textContent = 'Menyimpan...'; msg.className = 'text-sm text-gray-500';
        try {
            const res = await fetch('/api/authors', { method: 'POST', headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' }, body: JSON.stringify(payload)});
            const data = await res.json();
            if (!res.ok) { throw data; }
            dataAuthors.push(data.data);
            authorPaginator.render();
            document.getElementById('authorCreateForm').reset();
            msg.textContent = 'Tersimpan'; msg.className = 'text-sm text-emerald-600';
            setTimeout(() => { closeAuthor(); }, 700);
        } catch (err) {
            const text = (err && err.message) ? err.message : 'Gagal menyimpan';
            msg.textContent = text; msg.className = 'text-sm text-red-600';
        }
    });
</script>
@endpush
