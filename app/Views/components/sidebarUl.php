<ul class="px-3">
    <li class="">
        <a href=<?= site_url('/dashboard/home') ?> class="<?= checkUrl('dashboard/home') ?>">
            Home
        </a>
    </li>
    <li class="mt-3">
        <a href=<?= site_url('/dashboard/workinprogress') ?> class="<?= checkUrl('dashboard/workinprogress') ?>">Work in
            progress PRs.</a>
    </li>
    <li class="mt-3">
        <a href=<?= site_url('/dashboard/completedprs') ?> class="<?= checkUrl('dashboard/completedprs') ?>">Completed
            PRs.</a>
    </li>
    <li class="mt-3">
        <a href=<?= site_url('/dashboard/wishlistprs') ?> class="<?= checkUrl('dashboard/wishlistprs') ?>">WishList
            Repos.</a>
    </li>
</ul>