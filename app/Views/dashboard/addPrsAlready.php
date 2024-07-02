<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo. login</title>
    <!-- Boostrap cdn-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- jquery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                <h4 class="h1">Add issue</h4>
                <hr>

                <section class="w-100">
                    <div class="card card-body d-flex gap-2 align-items-center">
                        <p class="h6 fw-bold">Add a new repo here</p>
                        <a href="<?= site_url('/dashboard/addprs') ?>" class="w-100"><button class="btn btn-primary shadow w-100">Click here</button></a>
                    </div>
                </section>


                <section class="mt-3 px-3" style="max-width:100%;">
                    <p class="h4 text-capitalize">previos added repos</p>

                    <section class="border border-dark" style="max-width:100%;max-height:50%;overflow-y:scroll;">
                        <table class="w-100 table table-responsive table-bordered">
                            <thead class="text-center">
                                <tr class="table-secondary">
                                    <th>Sno.</th>
                                    <th>Repo name</th>
                                    <th>issues</th>
                                    <th>prs</th>
                                    <th>Merged</th>
                                    <th>Dated date</th>
                                    <th>Last update date</th>
                                    <th>Action</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $index = 1;
                                foreach ($data as $row) : ?>
                                    <tr>
                                        <td><?= $index++ ?></td>
                                        <td><?= $row->repo_name ?></td>
                                        <td><?= $row->total_issues ?></td>
                                        <td>not coded</td>
                                        <td>not coded</td>
                                        <td class="text-nowrap"><?= $row->created_at ?></td>
                                        <td><?= $row->updated_at == "" ? "Not updated" : $row->updated_at ?></td>
                                        <td class="d-flex justify-content-center gap-1">
                                            <button class="btn btn-warning">Edit</button> |
                                            <button class="btn btn-success">Add</button>
                                        </td>
                                        <td><button class="btn btn-danger">remove</button></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </section>
                </section>


            </section>
        </section>
    </main>
    <script>
        // $('document').ready(() => {
        //     const githubNameSelect = $('#githubNameSelect');
        //     const githubNameTr = $('#githubNameId')[0];
        //     console.log(githubNameTr);

        //     githubNameSelect.change((event) => {
        //         if (event.target.value == "other") {
        //             githubNameTr.style.display = "block";
        //         }
        //     });

        // });
    </script>
</body>

</html>