<div class="container">
    <div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Your details</h3>
        <div class="card-body" style="margin-top: 20px;">
            <table class="table fixed_header table-bordered table-responsive-sm table-striped text-center">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="display:none;"><?php print $user->getId() ?></td>
                        <td><?php print $user->getFirstName() ?></td>
                        <td><?php print $user->getUsername() ?></td>
                        <td><?php print $user->getEmail() ?></td>
<!--                        <td>--><?php //print $user->getPassword() ?><!--</td>-->
    <!--                <td><?php //print $user->getCreatedAt()  ?></td>
                        <td><?php //print $user->getUpdatedAt()  ?></td>-->
                        <td>
                            <a href="index.php?controller=users&action=updateOne&id=<?php print $user->getId() ?>">Edit</a>
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