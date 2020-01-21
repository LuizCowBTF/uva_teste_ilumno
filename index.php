<?php

    require __DIR__ . "/vendor/autoload.php";

    $message = '';
    $error = '';

    if(isset($_POST["submit"]))  
    {  
        if(empty($_POST["nombre"]))
        {
            $error = "<label class='text-danger'>Su nombre</label>";
        }
        else if(empty($_POST["email"]))
        {
            $error = "<label class='text-danger'>Su e-mail</label>";
        }
        else if(empty($_POST["tipodoc"]))
        {
            $error = "<label class='text-danger'></label>";
        }
        else if(empty($_POST["numdoc"]))
        {
            $error = "<label class='text-danger'></label>";
        }
        else
        {
            if(file_exists('db.json'))
            {
                $data = file_get_contents('db.json');
                $json_arr = json_decode($data, true);
                $data[content_reg][fields_form][value]= $_POST[nombre];
                $data[content_reg][fields_form][value]= $_POST[email];
                $data[content_reg][fields_form][value]= $_POST[tipodoc];
                $data[content_reg][fields_form][value]= $_POST[numdoc];
                $final_data = json_encode($array_data);

                $ch = curl_init('http://hechoparaliderar.com/SIAF/api/php/proxys/regsproxy.php');

                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($json)
                    )
                );

                if(file_put_contents('db.json', $final_data))
                {
                    $message = "<label class='text-success'>Arquivo alterado com sucesso!</p>";
                }
            }
            else
            {
                $error = 'Arquivo Json não existe!';
            }
        }
    }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//pt-br" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>TESTE UVA</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="app/css/style.css" />
    </head>
    <body>
        <div class="container-fluid">
            <div class="mx-auto bg-dark">
                <img src="app/imagem/logo.png" alt="#" />
            </div>
            <div class="w-50">
                <div class="formulario">
                    <div class="titulo1">
                        <h3>Faça a cotação do seguro do seu veículo.</h3>
                    </div>
                    <div class="titulo2">
                        <h5>Entraremos em contato com você.</h5>
                    </div>
                    <form id="formCotar" method="POST">
                        <?php
                        
                            if(isset($error))
                            {
                                echo $error;
                            }
                        ?>
                        <div class="form-inline">
                            <div class="form-group">
                                <label id="labNome" for="nombre">Nome</label>
                                <input id="inpNome" class="form-control input-lg" type="text" name="nombre" placeholder="Nome" />
                            </div>
                            <div class="form-group">
                                <label id="labMail" for="email">E-mail</label>
                                <input id="inpMail" class="form-control input-lg" type="text" name="email" placeholder="E-mail" />
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-group" id="select">
                                <label id="labDocT" for="tipodoc">Tipo de Documento</label>
                                <select id="inpDocT" class="default-select" name="tipodoc">
                                    <option value="#"></option>
                                    <option value="cedula">Cedula</option>
                                    <option value="cedulaExt">Cedula extranjería</option>
                                    <option value="tarjetaId">Tarjeta de identidad</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label id="labNumD" for="numdoc">Número do Documento</label>
                                <input id="inpNumD" class="form-control" type="text" name="numdoc" placeholder="Nº Doc." />
                            </div>
                        </div>
                        <div class="botaoSub">
                            <button type="submit" class="but_comando btn-block btn-lg" style="background-color:#BBD550; color:#FFFFFF; font-size:22px;font-weigth:bold;">Cotar</button>
                        </div>
                        <div class="rodape">
                            <a href="#">Recuperar cotação</a>
                        </div>
                        <?php

                            if(isset($message))
                            {
                                echo $message;
                            }
                        ?>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>
</html>

