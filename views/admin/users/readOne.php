<a href="index.php?controller=users&action=readOne" class="btn btn-info" id="adminBtn">Manage User</a>
<div class="container">
    <div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Manage Users</h3>
        <div class="card-body">
            <table class="table fixed_header table-bordered table-responsive-sm table-striped text-center">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php print $user->getUsername() ?></td>
                        <td><?php print $user->getEmail() ?></td>
                        <td><?php print $user->getPassword() ?></td>
                        <td>
                            <a href="index.php?controller=users&action=update&id=<?php print $user->getId() ?>">Edit</a>
                        </td>
                        <td>
                            <a href="index.php?controller=users&action=delete&id=<?php print $user->getId() ?>">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>