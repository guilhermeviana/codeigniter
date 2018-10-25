<!DOCTYPE html>
<html>
    <head>
        <title>Sistema de Login</title>
    </head>
    <body>
        <div class="container">
            <?php if (!$this->session->userdata("usuario_logado")) : ?>
                <h1>Login</h1>
                <?php
                //Criação de formulario
                echo form_open("Recuperar_Credencial/update");

                echo form_label("Digite a nova senha", "senha");
                echo form_password(array(
                    "name" => "senha",
                    "id" => "senha",
                    "class" => "form-control",
                    "naxlenth" => "255"
                ));
                echo form_label("Digite novamente a senha", "senha2");
                echo form_password(array(
                    "name" => "senha2",
                    "id" => "senha2",
                    "class" => "form-control",
                    "naxlenth" => "255"
                ));
                echo form_button(array(
                    "class" => "btn btn-primary",
                    "content" => "Login",
                    "type" => "submit"
                ));
                
                echo form_input(array(
                    "name" => "id",
                    "id" => "id",
                    "value" => $id,
                    "style" => "display: none",
                    
                ));

            endif;

            echo form_close();
            ?>
    </body>
</html>