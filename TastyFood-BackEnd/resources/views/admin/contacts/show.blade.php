<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.contacts.index') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Pesan Masuk') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-8 text-gray-900 space-y-6">
                
                <!-- Sender Info Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-6 border-b border-gray-100 gap-4">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">{{ $contact->name }}</h3>
                        <a href="mailto:{{ $contact->email }}" class="text-sm font-semibold text-amber-600 hover:text-amber-700 mt-1 inline-block">
                            {{ $contact->email }}
                        </a>
                    </div>
                    <div class="text-xs text-gray-400 font-medium bg-gray-50 border border-gray-100 px-3 py-1.5 rounded-lg self-start sm:self-auto">
                        Diterima: {{ $contact->created_at->format('d M Y H:i') }} ({{ $contact->created_at->diffForHumans() }})
                    </div>
                </div>

                <!-- Subject -->
                <div>
                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Subjek</span>
                    <h4 class="text-md font-bold text-gray-900">{{ $contact->subject }}</h4>
                </div>

                <!-- Message Box -->
                <div>
                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Pesan</span>
                    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-6 text-sm text-gray-700 leading-relaxed whitespace-pre-wrap">
                        {{ $contact->message }}
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="pt-6 border-t border-gray-100 flex justify-between gap-3">
                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-red-50 hover:bg-red-100 text-red-600 rounded-xl font-bold text-xs uppercase tracking-widest transition-colors">
                            Hapus Pesan
                        </button>
                    </form>
                    
                    <a href="mailto:{{ $contact->email }}?subject=Balasan: {{ rawurlencode($contact->subject) }}" class="inline-flex items-center px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-white rounded-xl font-bold text-xs uppercase tracking-widest shadow-md shadow-amber-500/10 transition-colors">
                        Balas via Email
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
