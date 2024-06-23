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

    <style>
        #githubNameId {
            display: hidden;
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

                <section class="card">
                    <div class="card-body">
                        <form class="w-100">
                            <table class="w-100" style="border-collapse:collapse;">
                                <tbody class="w-100">

                                    <tr class="row align-items-center">
                                        <td class="fw-bold col-2">Previous Repo : </td>
                                        <td class="col">
                                            <select class="form-control border border-secondary" id="githubNameSelect" name="githubNameSelect">
                                                <option>sample 1</option>
                                                <option>sample 2</option>
                                                <option>sample 3</option>
                                                <option>other</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr class="mt-3 row align-items-center" id="githubNameId">
                                        <td class="fw-bold col-2">Repo name : </td>
                                        <td class="col"><input type="text" name="reponame" class="form-control border border-secondary"></td>
                                    </tr>

                                    <tr class="mt-3 row align-items-center">
                                        <td class="fw-bold col-2">issue number : </td>
                                        <td class="col"><input type="text" name="reponame" class="form-control border border-secondary"></td>
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
            const githubNameSelect = $('#githubNameSelect');
            const githubNameTr = $('#githubNameId')[0];
            console.log(githubNameTr);

            githubNameSelect.change((event) => {
                if (event.target.value == "other") {
                    githubNameTr.style.display = "block";
                }
            });

        });
    </script>
</body>

</html>