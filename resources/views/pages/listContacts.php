<?php
if(isset($route["msg"]))
    echo "<script>alert('".$route["msg"]."');</script>";


$contactList = isset($route["contactsList"]) ? $route["contactsList"] : null;
?>
<div class="row">
    <div class="col-xs-12">
        <h3 class="header smaller lighter blue">
            Lista de Contatos
        </h3>

        <form class="form-horizontal center" role="form" action="?acao=2" method="post">
            <div class="panel-body">
                <?php if(!is_null($contactList)) : ?>
                    <table class="table table-hover table-bordered main-table">
                        <thead>
                        <tr>
                            <th class="center">Nome</th>
                            <th class="center">Sobrenome</th>
                            <th class="center">Telefone 1</th>
                            <th class="center">Telefone 2</th>
                            <th class="center">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ( $contactList as $contact ) : ?>
                                <tr>
                                    <td id="name_<?=$contact["id"]?>">
                                        <?=$contact["name"]?>
                                    </td>

                                    <td id="last_name_<?=$contact["id"]?>">
                                        <?=$contact["last_name"]?>
                                    </td>

                                    <td id="fone_1_<?=$contact["id"]?>">
                                        <?=$contact["fone_1"]?>
                                    </td>

                                    <td id="fone_2_<?=$contact["id"]?>">
                                        <?=$contact["fone_2"]?>
                                    </td>

                                    <td>
                                        <a class="blue" id="edit_<?=$contact["id"]?>" onclick="editContactFields(<?=$contact["id"]?>);">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div class="alert alert-warning">
                        <button data-dismiss="alert" class="close" type="button">
                            <i class="ace-icon fa fa-times"></i>
                        </button>

                        <i class="ace-icon fa fa-exclamation-triangle"></i> &nbsp; Nenhum contato na agenda! Cadastre-os em "Cadastro de contatos" para visualizá-los!
                    </div>
                <?php endif ?>
            </div>

            <div class="dv-comp-save col-xs-12 center hide">
                <button class="btn btn-success" type="submit">
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    Salvar
                </button>
            </div>
        </form>
    </div>
</div>