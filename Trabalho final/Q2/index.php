<!DOCTYPE html>

<html>
<head>
    <title>Municipios</title>
    <link rel="stylesheet" href="style.css">
</head>

<body style="margin:30px;">
    <form action="" method='post'>
        <input type="submit" value="Mostrar toda tabela" name='all'>
    </form>    

    <br>

    <form action="" method='post'>
        <input type="submit" value='Numero de municipios por estado' name='estados'>
    </form>

    <br>

    <form action="" method='post'>
        Selecionar Estado
        <select name="sigla">
            <option value="none">None</option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
        </select>

        Numero de municipios
        <input type="number" name='num_municipios'>

        <input type="submit" value='fazer busca' name='busca'>
    </form>

    <br>

    <form action="" method='post'>
        <input type="submit" value='Municipios mais populosos' name='busca1'>
    </form>

    <form action="" method='post'>
        <input type="submit" value='Municipios menos populosos' name='busca2'>
    </form>

    <form action="" method='post'>
        <input type="submit" value='População de cada estado' name='busca3'>
    </form>
</body>

    <?php   
        require_once("functions.php");

        $pdo = new PDO("mysql:host=127.0.0.1;dbname=a2022951047@teiacoltec.org", "a2022951047@teiacoltec.org", "coltec2024");
        $tabela = 'municipios_brasil_populacao_2022_V5';

        if (isset($_POST['all'])) {
            printTable(selectFromTable($pdo, $tabela, ["*"], "", "", "", ""));
        }

        else if (isset($_POST['estados'])) {
            printTable(selectFromTable($pdo, $tabela, ["Unidade_federativa as 'Estado'", "count(Unidade_federativa) as 'Numero de municípios'"], "Unidade_federativa", "", "", "Unidade_federativa"));
        }

        else if (isset($_POST['busca'])) {
            $whereClause = "";
            $limitClause = "";
            $orderByClause = "";

            if (!empty($_POST['sigla'])) {
                $whereClause = "Sigla_Estado=" . '\'' . $_POST['sigla'] . '\'';
            }

            if (!empty($_POST['num_municipios'])) {
                $orderByClause = "População desc";
                $limitClause = $_POST['num_municipios'];
            }

            else {
                $orderByClause = "Município";
            }

            if (!empty($_POST['sigla'])) {
                printTable(selectFromTable($pdo, $tabela, ["count(*) as 'Municípios do estado'"], "", "Sigla_Estado=" . '\'' . $_POST['sigla'] . '\'', "", ""));
            }

            printTable(selectFromTable($pdo, $tabela, ["Município", "População", "Código_IBGE"], $orderByClause, $whereClause, $limitClause, ""));
        }

        else if (isset($_POST['busca1'])) {
            printTable(selectFromTable($pdo, $tabela, ["Município", "População", "Código_IBGE"], "População desc", "", 10, ""));
        }

        else if (isset($_POST['busca2'])) {
            printTable(selectFromTable($pdo, $tabela, ["Município", "População", "Código_IBGE"], "População asc", "", 10, ""));
        }

        else if (isset($_POST['busca3'])) {
            printTable(selectFromTable($pdo, $tabela, ["Unidade_federativa as 'Estado'", "sum(População) as 'População'"], "Unidade_Federativa", "", "", "Unidade_federativa"));
        }
    ?>
</html>
