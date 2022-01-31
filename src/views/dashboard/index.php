<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer> </script>
    <link type="text/css" rel="stylesheet" href="<?= CSS ?>/main.css" />
    <script src="<?= JS ?>//index.js" defer></script>
    <!-- <script src="../assets/js/location.js" defer></script> -->
    <title>Document</title>
</head>
<body>
    <?php
    include PARTIALS . "/header.php";
    ?>
    <p>
        <?= $this->mensaje ?>
    </p>
    <!-- Main table with employees data -->
    <main class="container-xl my-5">
    <table class="table table-striped table-bordered">
        <thead>
        <tr class="table-primary">
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Str No.</th>
            <th>City</th>
            <th>State</th>
            <th>Postal Code</th>
            <th>Phone Number</th>
            <th><a id="btn-add-employee"class="btn btn-primary w-100 text-center" href="<?= BASE_URL . '/employee/render'?>">Add Employee</a></th>
        </tr>
        </thead>
        <!-- Loop through all employees in the JSON and create a new row in the table body -->
        <tbody id="employees-table">
        <?php 
        $employees = $this->employees;
        foreach ($employees as $employee) : ?>
            <tr id="row-<?= $employee->id ?>">
                <td><?= $employee->name ?></td>
                <td><?= $employee->email ?></td>
                <td><?= $employee->age ?></td>
                <td><?= $employee->streetAddress ?></td>
                <td><?= $employee->city ?></td>
                <td><?= $employee->state ?></td>
                <td><?= $employee->postalCode ?></td>
                <td><?= $employee->phoneNumber ?></td>
                <td class="d-flex justify-content-between">
                    <a href="<?= BASE_URL . 'employee/getEmployee/' . $employee->id?>" class="btn btn-outline-info"><i class="far fa-eye" data-viewId=<?= $employee->id?> ></i></a>
                    <!-- <button data-update='<?= $employee->id?>' class="btn btn-outline-secondary"><i class="fas fa-user-edit"></i></button> -->
                    <button class="deleteBtn btn btn-outline-danger" data-id="<?= $employee->id?>"><i class="far fa-trash-alt"></i></button>
                    <!-- <a data-delete = '<?= $employee->id?>' class="btn btn-outline-danger" href="#deleteModal" data-toggle="modal"><i class="far fa-trash-alt"></i></a> -->
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </main>

    <?php
    include PARTIALS . "/footer.php";
    ?>

</body>
</html>