<?php
$i = 1;
?>
<a href="/create" class="btn btn-primary my-3">
    Tambah
</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">NPM</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Created_At</th>
            <th scope="col">Updated_At</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mahasiswa as $data) { ?>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $data['npm'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td><?= $data['created_at'] ?></td>
                <td><?= $data['updated_at'] ?></td>
                <td>
                    <div class="d-flex">
                        <a href="/edit/<?= $data['id'] ?>" class="btn btn-warning btn-sm me-2">
                            <ion-icon name="create-outline"></ion-icon>
                        </a>
                        <form action="/delete/<?= $data['id'] ?>" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm">
                                <ion-icon name="trash-outline"></ion-icon>
                            </button>

                        </form>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>