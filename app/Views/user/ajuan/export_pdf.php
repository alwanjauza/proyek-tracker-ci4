<!DOCTYPE html>
<html>

<head>
    <style>
        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Laporan Pengembangan Aplikasi Tahun <?= date("Y") ?></h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Aplikasi</th>
                <th>Nama Pengaju</th>
                <th>Jenis Ajuan</th>
                <th>Nama Tim</th>
                <th>Persentase</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($project as $p) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $p->nama_aplikasi; ?></td>
                    <td><?= $p->fullname; ?></td>
                    <td><?= $p->jenis_app_name; ?></td>
                    <td><?= $p->nama_tim; ?></td>
                    <td><?= $p->percentage; ?>%</td>
                    <td>
                        <?php if ($p->status == 'on_review') : ?>
                            On Review
                        <?php elseif ($p->status == 'rejected') : ?>
                            Rejected
                        <?php elseif ($p->status == 'Done') : ?>
                            Done
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>