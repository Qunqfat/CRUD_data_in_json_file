<?php if (empty($users)) : ?>
<div class="table-container">
    <h1>Brak wpisów</h1>
</div>
<?php endif; ?>



<div class="table-container" id="tabel-container">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Company</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody class="tbody">
            <?php if ($users) : ?>
            <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><a href="mailto:<?php echo $user['email']; ?>"><?php echo $user['email']; ?></a></td>
                <td><?php echo $user['address']['street'] . ', ' . $user['address']['zipcode'] . ' ' . $user['address']['city']; ?>
                </td>
                <td><?php echo $user['phone']; ?></td>
                <td><?php echo $user['company']['name']; ?></td>
                <td>
                    <button data-user-id="<?php echo $user['id']; ?>" class="btn-remove">remove</button>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>

        </tbody>
    </table>
</div>
<div class="btn-container">
    <button class="btn-add" id="btn-add">Dodaj wpis
    </button>
</div>
<div id="form-container" class="form-container d-none">
    <?php include __DIR__ . '/FormView.php'; ?>
</div>
<div class="custom-wrapper d-none" id="custom-wrapper">
    <div id="custom-dialog" class="custom-dialog">
        <div class="dialog-content">
            <p>Czy na pewno chcesz usunąć tego użytkownika?</p>
            <div class="buttons">
                <button class="confirm-btn" id="confirm-btn">Tak</button>
                <button class="cancel-btn" id="cancel-btn">Anuluj</button>
            </div>
        </div>
    </div>
</div>