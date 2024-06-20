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
</head>

<body>
    <main class="m-0 p-0">
        <?= view('components\navbar') ?>
        <section class="m-0 p-0 row justify-content-center">
            <div class="col-md-4 col-10">
                <div class="card mt-5">
                    <div class="card-body">
                        <h6 class="text-center fw-bold display-6">Login</h6>
                        <form action="" class="form" method="POST">

                            <!-- successfull message -->
                            <?php if (session()->getFlashdata('error')): ?>
                                <div class="alert alert-danger m-0" role="alerr">
                                    <?= session()->getFlashdata('error') ?>
                                </div>
                            <?php endif; ?>

                            <?php if (isset($validation)): ?>
                                <div class="alert alert-danger m-0">
                                    <ul>
                                        <?php foreach ($validation as $row): ?>
                                            <li><?= $row ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <table class="w-100" style="border-collapse: separate;border-spacing:0rem 1.5rem;">
                                <tr>
                                    <td><label>Username</label></td>
                                    <td> <input type="text" name="username" class="form-control w-100" /></td>
                                </tr>
                                <tr>
                                    <td><label>Password</label></td>
                                    <td> <input type="password" name="password" class="form-control w-100" /></td>
                                </tr>
                                <tr>
                                    <td colspan=2>
                                        <button class="btn btn-primary form-control">Login</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <p style="font-size:0.8rem;">create a new account ?
                            <a href=<?= site_url('auth/signup') ?>>click here</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>