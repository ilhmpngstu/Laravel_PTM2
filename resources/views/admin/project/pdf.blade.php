<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Project - projects.pdf</title>
    <style>
        @page {
            margin: 25mm 20mm 20mm 20mm;
        }

        body {
            font-family: 'Times-Roman', Times, serif;
            color: #000000;
            margin: 0;
            padding: 0;
        }

        h2.title {
            font-size: 26px;
            font-weight: bold;
            margin-top: 0;
            margin-bottom: 22px;
            color: #000000;
        }

        table.project-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000000;
        }

        table.project-table th,
        table.project-table td {
            border: 1px solid #000000;
            padding: 8px 6px;
            vertical-align: middle;
            font-size: 12px;
        }

        table.project-table th {
            text-align: center;
            font-weight: bold;
            font-size: 13px;
            padding: 10px 6px;
        }

        .text-center {
            text-align: center;
        }

        .img-cell {
            text-align: center;
            padding: 6px;
        }

        .project-img {
            max-width: 65px;
            max-height: 55px;
        }

        /* Watermark Background */
        .watermark {
            position: fixed;
            top: 38%;
            left: 0;
            right: 0;
            width: 100%;
            text-align: center;
            transform: rotate(-30deg);
            transform-origin: 50% 50%;
            font-size: 40px;
            font-weight: bold;
            color: #c8c8c8;
            opacity: 0.20;
            z-index: -1000;
            line-height: 1.4;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* Footer Laporan */
        .pdf-footer {
            position: fixed;
            bottom: -12mm;
            left: 0;
            right: 0;
            font-size: 9px;
            color: #777777;
            text-align: right;
            border-top: 0.5px solid #cccccc;
            padding-top: 4px;
        }
    </style>
</head>
<body>

    <!-- Watermark Diagonal -->
    <div class="watermark">
        ILHAM PANGESTU<br>251011700008
    </div>

    <!-- Footer PDF -->
    <div class="pdf-footer">
        Laporan dicetak oleh: <strong>ILHAM PANGESTU</strong> (NIM: <strong>251011700008</strong>) &bull; Sistem Informasi UNPAM
    </div>

    <h2 class="title">Data Projects</h2>

    <table class="project-table">
        <thead>
            <tr>
                <th style="width: 6%;">No</th>
                <th style="width: 18%;">Gambar</th>
                <th style="width: 14%;">Title</th>
                <th style="width: 15%;">Teknologi</th>
                <th style="width: 37%;">Description</th>
                <th style="width: 10%;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="img-cell">
                        @php
                            $imagePath = public_path('images/' . $item->image);
                            $base64 = '';
                            if ($item->image && file_exists($imagePath)) {
                                $ext = pathinfo($imagePath, PATHINFO_EXTENSION);
                                $imgData = file_get_contents($imagePath);
                                $base64 = 'data:image/' . $ext . ';base64,' . base64_encode($imgData);
                            }
                        @endphp

                        @if($base64)
                            <img src="{{ $base64 }}" class="project-img" alt="{{ $item->title }}">
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->teknologi }}</td>
                    <td>{{ $item->description }}</td>
                    <td class="text-center">{{ $item->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
