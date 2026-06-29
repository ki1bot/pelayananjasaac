@php
    $kelasLebarFooter = ($lebar ?? 'normal') === 'penuh'
        ? 'max-w-[1700px]'
        : 'max-w-7xl';
@endphp

<footer class="border-t border-slate-200 bg-white/80 backdrop-blur-xl">
    <div class="mx-auto flex {{ $kelasLebarFooter }} items-center justify-center px-4 py-8 text-center text-sm text-slate-500 sm:px-6 lg:px-8">
        <div>
            <p class="font-black text-slate-800">© {{ date('Y') }} Pelayanan Jasa Ac</p>
            <p class="mt-2 leading-6">Menyediakan Ac yang berkualitas.</p>
        </div>
    </div>
</footer>
