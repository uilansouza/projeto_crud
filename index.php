
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once "inc/header.php";?>
    <title>Projeto CRUD - Login</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col"></div>
                <div class="col align-self-center">
                    <br>
                    
                    <br>

                    <form class="login" action="login.php" method="POST" >
                    <center><h1>Login</h1></center>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email"  placeholder="jonh@exemple.com">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" class="form-control" id="senha" placeholder="****">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Lembrar-me</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Acessar</button>
                    </form>
                </div>
            <div class="col"></div>
        </div>
    </div>




        </div>
    </div>
</body>
</html>