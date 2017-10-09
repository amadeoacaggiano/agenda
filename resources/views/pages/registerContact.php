<?php
    if(isset($route["msg"]))
        echo "<script>alert('".$route["msg"]."');</script>";
?>
<div class="row">
    <div class="col-xs-12">
        <h3 class="header smaller lighter blue">
            Cadastro de Contatos
        </h3>

        <form class="form-horizontal" role="form" action="?acao=0" method="POST">
            <div class="form-group mg-btn-40">
                <p class="container">Nota:<span class="red">*</span> Campos Obrigatórios</p>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label no-padding-right" for="name"><span class="red">*</span>Nome: </label>

                <div class="col-sm-4">
                    <input type="text" name="name" id="name" required maxlength="50" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label no-padding-right" for="lastName"><span class="red">*</span>Sobrenome: </label>

                <div class="col-sm-4">
                    <input type="text" name="lastName" id="lastName" required maxlength="150" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label no-padding-right" for="fone1" ><span class="red">*</span>Telefone 1: </label>

                <div class="col-sm-4">
                    <input type="text" name="fone1" id="fone1" required class="form-control fone">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label no-padding-right" for="fone2"><span class="red">*</span>Telefone 2: </label>

                <div class="col-sm-4">
                    <input type="text" name="fone2" id="fone2" required class="form-control fone">
                </div>
            </div>

            <div class="col-xs-12 center">
                <button class="btn btn-success" type="submit">
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    Cadastrar
                </button>
            </div>

            <input type="hidden" name="save" value="1">
        </form>
    </div>
</div>