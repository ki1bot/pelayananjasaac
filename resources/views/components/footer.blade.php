@php
    $kelasLebarFooter = ($lebar ?? 'normal') === 'penuh'
        ? 'max-w-[1700px]'
        : 'max-w-7xl';
@endphp

<footer class="border-t border-slate-200 bg-white/80 backdrop-blur-xl">
    <div class="mx-auto grid {{ $kelasLebarFooter }} gap-6 px-4 py-8 text-sm text-slate-500 sm:px-6 md:grid-cols-3 lg:px-8">
        <div>
            <p class="text-base font-black text-slate-900">Pelayanan Jasa AC Bekasi</p>
            <p class="mt-2 leading-6">
                Service, beli, dan jual AC untuk area Bekasi, Jakarta, Bogor, dan Tangerang.
            </p>
        </div>

        <div>
            <p class="font-black text-slate-800">Area Layanan</p>
            <p class="mt-2 leading-6">Bekasi, Jakarta, Bogor, Tangerang</p>
        </div>

        <div class="md:text-right">
            <p class="font-black text-slate-800">© {{ date('Y') }} Jasa AC Bekasi</p>
            <p class="mt-2 leading-6">Harga mengikuti lokasi dan jenis layanan.</p>
        </div>
    </div>
</footer>
