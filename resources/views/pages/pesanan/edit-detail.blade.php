@extends('layouts.aplikasi', ['judul' => 'Edit Detail Pesanan'])

@section('konten')
    <div class="mx-auto max-w-2xl">
        <div class="kartu rounded-[2.2rem] p-6 sm:p-8">
            <p class="text-sm font-black text-blue-600">{{ $detailPesanan->layanan->nama }}</p>
            <h2 class="mt-2 text-3xl font-black text-slate-950">Edit Detail Pesanan</h2>

            <form action="{{ route('detail-pesanan.update', $detailPesanan) }}" method="POST" class="mt-6 space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="text-sm font-black text-slate-800">Lokasi dan Tarif Jarak</label>
                    <select name="tarif_jarak_layanan_id" class="select-form mt-2" required>
                        @foreach($tarif as $item)
                            <option value="{{ $item->id }}" @selected($detailPesanan->tarif_jarak_layanan_id === $item->id)>
                                {{ $item->lokasi->kota }} - Rp {{ number_format($item->harga_jarak, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="text-sm font-black text-slate-800">Merk AC</label>
                    <select name="merk_ac_id" class="select-form mt-2">
                        <option value="">Pilih merk AC</option>
                        @foreach($merkAc as $merk)
                            <option value="{{ $merk->id }}" @selected($detailPesanan->merk_ac_id === $merk->id)>
                                {{ $merk->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="text-sm font-black text-slate-800">Jumlah</label>
                    <input type="number" name="jumlah" value="{{ old('jumlah', $detailPesanan->jumlah) }}" min="1" class="input-form mt-2" required>
                </div>

                <div>
                    <label class="text-sm font-black text-slate-800">Catatan</label>
                    <textarea name="catatan" rows="4" class="input-form mt-2">{{ old('catatan', $detailPesanan->catatan) }}</textarea>
                </div>

                <button class="w-full rounded-2xl tombol-primer px-5 py-3 font-black">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection
