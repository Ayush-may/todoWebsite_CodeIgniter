<style>
    nav {
        height: auto;
        border-bottom: 5px solid orange;

        position: absolute;
        top: 0;
        left: 0;
        right: 0;
    }

    p {
        font-size: 0.8rem;
    }
</style>
<nav class="w-100 d-flex justify-content-between align-items-center px-4 bg-white">
    <h5 class="text-center py-3 h3 fw-bold"><span class="text-warning">GSOC</span>'24 PR.</h5>
    <div class="d-flex align-items-center gap-3">
        <form action="/logout" method="POST">
            <button class="btn btn-sm btn-danger">log out</button>
        </form>
        <p class="text-uppercase p-0 m-0">username : <?= session()->get('user') ?></p>
    </div>
</nav>