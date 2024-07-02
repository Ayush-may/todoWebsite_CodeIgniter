<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo. Add issue</title>
    <!-- Boostrap cdn-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- jquery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="/assets/home.css">
    <link rel="stylesheet" href="/assets/mediaQuery.css">

    <style>
        #githubNameId {
            display: hidden;
        }

        option span {
            width: 10px;
            height: 10px;
        }
    </style>
</head>

<body class="container h-100  bg-light shadow px-0">
    <main class="m-0 p-0 h-100 bg-light position-relative">
        <?= view('components\navbarAuth') ?>

        <section class="contents h-100">
            <section class="sidebar h-100 shadow bg-dark bg-gradient ">
                <?= view('components/sidebarUl') ?>
            </section>
            <section class="mainContents w-100 h-100 text-dark">
                <h4 class="h1">Add issue</h4>
                <hr>

                <button class="btn btn-primary btn-sm mb-3" onclick="javascript:window.history.back()">Go back</button>

                <section class="card">
                    <div class="card-body">

                        <form action="" method="POST" id="add_repo">
                            <?php if (session()->getFlashdata('validate_error')) : ?>
                                <div class="alert alert-danger">
                                    <?= session()->getFlashdata('validate_error') ?>
                                </div>
                            <?php endif; ?>

                            <?php if (session()->getFlashdata('validate_success')) : ?>
                                <div class="alert alert-success">
                                    <?= session()->getFlashdata('validate_success') ?>
                                </div>
                            <?php endif; ?>

                            <!-- form -->
                            <table class="w-100">
                                <tbody>
                                    <!-- <tr>
                                        <td class="pe-4 " style="text-wrap: nowrap;">Previous Repo :</td>
                                        <td style="min-width:100%">
                                            <select class="form-control border border-secondary" id="githubNameSelect" name="githubNameSelect">
                                                <option>sample 1</option>
                                                <option>sample 2</option>
                                                <option>sample 3</option>
                                                <option>other</option>
                                            </select>
                                        </td>
                                    </tr> -->

                                    <tr class="">
                                        <td class="pe-4" style="text-wrap:nowrap;">Repo name : </td>
                                        <td class="" style="min-width:100%;">
                                            <select class="form-control border border-secondary" name="repoName" id="repoNameSelect">
                                                <option selected disabled>select</option>
                                                <?php foreach ($repo_name as $row) : ?>
                                                    <option value="<?= $row->repo_name ?>"><?= $row->repo_name ?></option>
                                                <?php endforeach; ?>
                                                <option value="OTHER">OTHER</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr class="">
                                        <td class="pt-3 pe-2 text-nowrap">Repo name (New) : </td>
                                        <td class="pt-3">
                                            <input type="text" name="repoNameNew" id="repoNameNew" class="form-control border border-secondary">
                                        </td>
                                    </tr>

                                    <tr class="">
                                        <td class="pt-3">Repo Link : </td>
                                        <td class="pt-3">
                                            <input type="text" name="repoLink" class="form-control border border-secondary">
                                        </td>
                                    </tr>

                                    <tr class="">
                                        <td class="pt-3">Issue number : </td>
                                        <td class="pt-3">
                                            <input type="number" name="issueNumber" class="form-control border border-secondary">
                                        </td>
                                    </tr>

                                    <tr class="">
                                        <td class="pt-3">Priority : </td>
                                        <td class="pt-3">
                                            <select class="form-control border border-secondary" id="priority" name="priority">
                                                <option selected disabled>select</option>
                                                <option value="LOW">low</option>
                                                <option value="MEDIUM">medium</option>
                                                <option value="HIGH">high</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="pt-3">Assigned : </td>
                                        <td class="pt-3">
                                            <div>
                                                <input type="radio" class="form-check-input border border-secondary" name="assignId" value="1" />
                                                <label>Assigned</label>
                                            </div>
                                            <div class="mt-2">
                                                <input type="radio" class="form-check-input border border-secondary" name="assignId" value="0" />
                                                <label>Not assigned yet</label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan=2 class="pt-3">
                                            <button class="btn btn-primary w-100" form="add_repo">Submit</butto>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </form>

                    </div>
                </section>

            </section>
        </section>
    </main>

    <script>
        $('document').ready(() => {
            $('#repoNameNew').prop('disabled', true);

            $('#repoNameSelect').change(() => {
                if ($('#repoNameSelect').val() == 'OTHER') {
                    $('#repoNameNew').prop('disabled', false);
                } else {
                    $('#repoNameNew').prop('disabled', true);
                }
            })

        });
    </script>

</body>

</html>