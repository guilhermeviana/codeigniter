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
                echo form_open("login/autenticar");

                echo form_label("E-mail", "email");
                echo form_input(array(
                    "name" => "email",
                    "id" => "email",
                    "class" => "form-control",
                    "naxlenth" => "255"
                ));
                echo form_label("Senha", "senha");
                echo form_password(array(
                    "name" => "senha",
                    "id" => "senha",
                    "class" => "form-control",
                    "naxlenth" => "255"
                ));
                echo form_button(array(
                    "class" => "btn btn-primary",
                    "content" => "Login",
                    "type" => "submit"
                ));

            endif;

            echo form_close();
            ?>
                 <a href="http://127.0.0.1/code/index.php/Recuperar_Credencial/">Esqueci minha senha</a>
    </body>
</html>