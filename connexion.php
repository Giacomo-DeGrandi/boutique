<?php $title = "Log In" ?>
<?php session_start(); ?>
<?php require_once('Model/User.php'); ?>
<?php require_once('Model/Cart.php'); ?>

<?php require_once('Controller/user_controller.php'); // Models : User  &  Cart ?>

<?php   ob_start();  ?>
    <div class="d-flex flex-row justify-content-center align-items-center my-3">
        
        <div class="px-4" style="width:30%;">
            <img src="View/logos/login.svg" class="mt-5 ms-5">
        </div>
        

        <div class="container-md rounded-2 shadow-sm border 
                    border-light w-50 p-3">

            <form action="" method="POST">

                <!-- Email -->
                <div class="row">
                    <div class="form-group" >
                        <label for="email">Email</label>
                        <input type="text" class="form-control p-1 px-2 rounded-1" id="email" name="email">
                    </div>
                </div>


                <!-- Password -->
                <div class="row">
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control p-1 px-2 rounded-1" id="password" name="password">
                    </div>
                </div>
                
                <!-- Submit -->
                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-dark rounded-2 mb-4 mt-4 p-2 shadow-sm" name="submit_connection">Se connecter</button>
                </div>

            </form>

        </div>

    </div>
<?php  $content=ob_get_clean(); ?>

<?php require ('View/Patron.php'); ?>



