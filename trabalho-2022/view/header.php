<?php
include_once '../model/sessionStart.php';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <?php
                        if(isset($_SESSION['logado']) && $_SESSION['logado'] == TRUE){
                            echo"<a class='nav-link active' aria-current='page' href='dashboard.php'>Home</a>";
                        }
                        else{
                            echo"<a class='nav-link active' aria-current='page' href='index.php'>Home</a>";
                        }
                    ?>
                </li>

                <?php
                    if(isset($_SESSION['logado']) && $_SESSION['logado'] == TRUE){ ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['email'] ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <form action="../control/controleUsuario.php" method="post">
                                        <button class="dropdown-item" type="submit" value="sair" name="opcao">Sair</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>