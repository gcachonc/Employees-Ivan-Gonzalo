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
    <title>Employee</title>
</head>
<body>

    <?php
    include PARTIALS . "/header.php";
    ?>

    <!-- Employee details and update  -->
    <main class="container container-xl my-5">
        <div class="card">
            <div class="card-header">
                <h3>Employee details: <b><?= $this->employee->name." ".$this->employee->lastName?></b></h3>
            </div>
            <div class="card-body">
                <form action="<?= BASE_URL . 'employee/updateEmployee'?>" method="POST" enctype="multipart/form"> 
                    <div class="d-flex justify-content-center">
                        <div class="col-4">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="<?= $this->employee->name?>" class="form-control" required>
                            </div>
                    
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="<?= $this->employee->email?>" class="form-control" required>
                            </div>
                    
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="city" value="<?= $this->employee->city?>" class="form-control" required>
                            </div>
                    
                            <div class="form-group">
                                <label>State</label>
                                <input type="text" name="state" value="<?= $this->employee->state?>" class="form-control" required>
                            </div>
                    
                            <div class="form-group">
                                <label>Postal Code</label>
                                <input type="text" name="postalCode" value="<?= $this->employee->postalCode?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="lastName" value="<?= $this->employee->lastName?>" class="form-control" required>
                            </div>
        
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" value="<?= $this->employee->gender?>" class="form-control" required>
                                    <option value="male">man</option>
                                    <option value="male">woman</option>
                                </select>
                            </div>
        
                            <div class="form-group">
                                <label>Street Address</label>
                                <input type="text" name="streetAddress" value="<?= $this->employee->streetAddress?>" class="form-control" required>
                            </div>
        
                            <div class="form-group">
                                <label>Age</label>
                                <input type="text" name="age" value="<?= $this->employee->age?>" class="form-control" required>
                            </div>
        
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phoneNumber" value="<?= $this->employee->phoneNumber?>" class="form-control" required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="<?= BASE_URL . '/dashboard'?>" class="btn btn-secondary mx-2">Cancel</a>
                                <input type="submit" value="Update" class="btn btn-success mx-2">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <p>
                <?= $this->mensaje ?>
            </p>
        </div>
    </main>

    <?php
    include PARTIALS . "/footer.php";
    ?>
</body>

</html>