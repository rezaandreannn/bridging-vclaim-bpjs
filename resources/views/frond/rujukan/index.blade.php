<x-app-layout>
    <x-card-rujukan :noKartu="$biodata['noKartu']">
        <x-rujukan-biodata-content key="Nama" :value="$biodata['nama']" />
        <x-rujukan-biodata-content key="NIK" :value="$biodata['nik']" />
        <x-rujukan-biodata-content key="No MR" :value="$biodata['noMR']" />
        <x-rujukan-biodata-content key="Jenis Kelamin" :value="$biodata['sex'] == 'L' ? 'Laki-laki' : 'Perempuan'" />
        <x-rujukan-biodata-content key="Status" :value="$biodata['status']" :status="true" />
        <x-rujukan-biodata-content key="Kelas" :value="$biodata['kelas']" />
        <x-rujukan-biodata-content key="Jenis Peserta" :value="$biodata['peserta']" />
        <x-rujukan-biodata-content key="Tgl. Cetak Kartu" :value="$biodata['tglCetakKartu']" />
        <x-rujukan-biodata-content key="Tgl. Akhir Kartu" :value="$biodata['tglTAT']" />
    </x-card-rujukan>
</x-app-layout>
