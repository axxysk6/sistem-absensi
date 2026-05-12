<!DOCTYPE html>
<html>
<head>
    <title>Rekap Absensi</title>

    <style>

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

    </style>

</head>
<body>

    <h2 style="text-align:center;">
        Rekap Absensi Guru
    </h2>

    @if ($tanggal)

        <p>
            Tanggal:
            {{ $tanggal }}
        </p>

    @endif

    <table>

        <thead>

            <tr>
                <th>No</th>
                <th>Nama Guru</th>
                <th>Hadir</th>
                <th>Izin</th>
                <th>Sakit</th>
                <th>Alpha</th>
            </tr>

        </thead>

        <tbody>

            @foreach ($rekap as $r)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $r->nama }}
                    </td>

                    <td>
                        {{ $r->absensi()
                            ->where('status', 'Hadir')
                            ->when($tanggal, function ($query) use ($tanggal) {
                                $query->whereDate('tanggal', $tanggal);
                            })
                            ->count() }}
                    </td>

                    <td>
                        {{ $r->absensi()
                            ->where('status', 'Izin')
                            ->when($tanggal, function ($query) use ($tanggal) {
                                $query->whereDate('tanggal', $tanggal);
                            })
                            ->count() }}
                    </td>

                    <td>
                        {{ $r->absensi()
                            ->where('status', 'Sakit')
                            ->when($tanggal, function ($query) use ($tanggal) {
                                $query->whereDate('tanggal', $tanggal);
                            })
                            ->count() }}
                    </td>

                    <td>
                        {{ $r->absensi()
                            ->where('status', 'Alpha')
                            ->when($tanggal, function ($query) use ($tanggal) {
                                $query->whereDate('tanggal', $tanggal);
                            })
                            ->count() }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</body>
</html>