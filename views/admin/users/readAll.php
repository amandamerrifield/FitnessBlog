<div class="container">
    <div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Manage Users</h3>
        <div class="card-body">
            <table class="table fixed_header table-bordered table-responsive-sm table-striped text-center">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>admin</th>
                    <th>username</th>
                    <th>email</th>
<!--                    show hidden password?-->
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th></th>
                    <th></th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?php print $user->getId() ?></td>
                        <td><?php print $user->getAdmin() ?></td>
                        <td><?php print $user->getUsername() ?></td>
                        <td><?php print $user->getEmail()?></td>
<!--                        <td>--><?php //print $user->getPassword()?><!--</td>-->
                        <td><?php print $user->getCreatedAt() ?></td>
                        <?php print $user->getUpdatedAt() ?>
                        <td>
                            <a href="index.php?controller=users&action=update&id=<?php print $user->getId() ?>">Edit</a>
                        </td>
                        <td>
                            <a href="index.php?controller=users&action=delete&id=<?php print $user->getId() ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>