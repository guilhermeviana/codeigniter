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
                echo form_open("Recuperar_Credencial/valida");

                echo form_label("Digite seu e-mail de acesso", "email");
                echo form_input(array(
                    "name" => "email",
                    "id" => "email",
                    "class" => "form-control",
                    "naxlenth" => "255"
                ));          
                
                 echo form_button(array(
                    "class" => "btn btn-primary",
                    "content" => "Enviar",
                    "type" => "submit"
                ));

            endif;

            echo form_close();
            ?>
    </body>
</html>