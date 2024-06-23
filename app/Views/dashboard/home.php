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
</head>

<body class="container h-100  bg-light shadow px-0">
    <main class="m-0 p-0 h-100 bg-light position-relative">
        <?= view('components\navbarAuth') ?>

        <section class="contents h-100">
            <section class="sidebar h-100 shadow bg-dark bg-gradient ">
                <?= view('components/sidebarUl') ?>
            </section>
            <section class="mainContents w-100 h-100 text-dark">
                <h4 class="h1">Dashboard</h4>
                <hr>
                <section class="px-3">
                    <section class="row">
                        <div class="col card card-body" style="width:auto;">
                            <div class="">
                                <p class="p-0 h5">Github Username : <?= $currentUser['githubUsername'] ?></p>
                            </div>
                            <div class="">
                                <p class="p-0 h5">Created at : <?= $currentUser['created_at'] ?></p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row" style="width:400px;height:300px;overflow:hidden">
                                <img id="githubUserImage" class="col-5" alt="" style="overflow:hidden;object-fit:cover;height:100%;width:100%;">
                                <p class="row col text-dark" style="margin-top:100px;">asdsadsadsadsad Ayush</p>
                            </div>
                        </div>
                    </section>

                    <div class="row gap-4 mt-4">
                        <div class="col p-3 bg-warning rounded ">
                            <p class="h4  text-white">Work in progress Pr.</p>
                        </div>
                        <div class="col p-3 bg-primary rounded ">
                            <p class="h4  text-white">Total Pr. 3</p>
                        </div>
                        <div class="col p-3 bg-success rounded ">
                            <p class="h4 text-white"> Completed Pr.</p>
                        </div>
                    </div>

                    <div class="row mt-3 gap-4">
                        <div class="col p-3 bg-primary rounded ">
                            <p class="h4  text-white">Total Pr. 3</p>
                        </div>
                        <div class="col p-3 bg-danger rounded">
                            <p class="h4  text-white">Total Pr.</p>
                        </div>
                    </div>

                </section>
            </section>
        </section>
    </main>

    <script>
        $('document').ready(() => {
            const githubUserImage = $('#githubUserImage')[0];

            $.ajax({
                url: 'https://api.github.com/users/ayush-may',
                type: 'GET',
                success: (response) => {
                    githubUserImage.src = response.avatar_url;
                },
            });
        });
    </script>
</body>

</html>