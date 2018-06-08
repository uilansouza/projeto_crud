<!-- validacao de erro -->
<br>
<?php if(isset($_GET['message']) && $_GET['message']=='failed'):?>
    <div class="alert alert-danger" role="alert">

        <?php
         if($_GET['action']=='add'){
            print "<center>ERRO AO CADASTRAR!</center>";

        }

        if ($_GET['action']=='remove'){
            print "<center>ERRO AO EXCLUIR O PRODUTO!</center>";
        }

        if ($_GET['action']=='edit'){
            print "<center>Ocorreu um erro ao Editar o Produto!</center>";
        }
        ?>
        

        
    </div>
<?php endif ;?>

<?php if(isset($_GET['message']) && $_GET['message']=='success'):?>
        <div class="alert alert-success" role="alert">
            <?php
                if($_GET['action']=='add'){
                    print "<center>Produto adicionado com sucesso!</center>";
                }
                if($_GET['action']=='remove'){
                    print "<center>Produto Excluido com sucesso!</center>";

                }
                if($_GET['action']=='edit'){
                    print "<center>Produto editado com sucesso!</center>";
                }
                
                ?>
        </div>
    <?php endif ?>
