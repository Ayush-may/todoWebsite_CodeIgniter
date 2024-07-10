<?php
$repo = $data[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo. login</title>
    <!-- Boostrap cdn-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <!-- jquery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="/assets/home.css">
    <link rel="stylesheet" href="/assets/mediaQuery.css">

    <style></style>
</head>

<body class="container h-100  bg-light shadow px-0">
<main class="m-0 p-0 h-100 bg-light position-relative">
    <?= view('components\navbarAuth') ?>

    <section class="contents ">
        <section class="sidebar h-100 shadow bg-dark bg-gradient ">
            <?= view('components/sidebarUl') ?>
        </section>

        <section class="mainContents w-100 h-100 pb-5 text-dark" style="overflow-y:scroll;">
            <h4 class="h1">Repo Details</h4>
            <hr>

            <div class="card">
                <div class="card-body">
                    <table>
                        <tbody class="">
                        <tr>
                            <td><p class="fw-bold h5 text-dark me-3">Name :</p></td>
                            <td><p class="h5"><?= $repo->repo_name ?></p></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!--This is issue table of current user and current repo selected -->
            <div>
                <h4 class="h2 mt-4">Issues</h4>
                <hr>
                <?php if (!isset($row)) { ?>
                    <table class="table table-bordered table-hover w-100">
                        <thead class="table-light">
                        <tr>
                            <th>Sno</th>
                            <th>Issue Number</th>
                            <th>Assigned</th>
                            <th>Pr Generated</th>
                            <th>close</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $index = 1;
                        foreach ($issue as $row): ?>
                            <tr data-key="<?= $row->issue_id ?>">
                                <td><?= $index++ ?></td>
                                <td><?= $row->issue_number ?></td>
                                <td><?= $row->issue_assign == 1 ? 'Assigned' : 'Not Assigned' ?></td>
                                <td>not coded rn</td>
                                <td>
                                    <button class="btn btn-outline-danger">close issue</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    No issue is created for this repo!
                <?php } ?>
            </div>

            <div>
                <h4 class="h2 mt-4">Pr</h4>
                <hr>

                <?php
                if (!isset($pr)) {
                    echo "this is not set";
                }
                ?>

            </div>


        </section>

    </section>
</main>
<script>
    $(document).ready(function () {
    });
</script>
</body>

</html>