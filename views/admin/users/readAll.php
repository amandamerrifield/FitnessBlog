<a href="index.php?controller=users&action=create" class="btn btn-info" id="adminBtn">Add User</a>
    <a href="index.php?controller=users&action=readAll" class="btn btn-info" id="adminBtn">Manage User</a>
    <div class="container">
    <div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Manage Users</h3>
        <div class="card-body">
            <table class="table fixed_header table-bordered table-responsive-sm table-striped text-center">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Admin</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>User Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php print $user->getId() ?></td>
                        <td><?php print $user->getAdmin() ?></td>
                        <td><?php print $user->getUsername() ?></td>
                        <td><?php print $user->getEmail()?></td>
                        <td><?php print $user->getPassword()?></td>
                        <td><?php print $user->getCreatedAt() ?></td>
                        <td><?php print $user->getUpdatedAt() ?></td>
                        <td><?php echo htmlspecialchars_decode($user->getUserContent(), ENT_QUOTES) ?></td>
                        <td>
                            <a href="index.php?controller=users&action=update&id=<?php print $user->getId() ?>">Edit</a>
                        </td>
                        <td>
                            <a href="index.php?controller=users&action=delete&id=<?php print $user->getId() ?>">Delete</a>
                        </td>
                    </tr>
                 <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>