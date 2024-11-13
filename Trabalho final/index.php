<!DOCTYPE html>

<html>
<head>
    <title>Resultados Kona-2024</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" method='post'>
        <input type="submit" value="Mostrar toda tabela" name='all'>
    </form>    

    <br>

    <form action="" method='post'>
        Selecionar por divisao
        <select name="divisao">
            <option value="none">None</option>
            <option value='M18-24'>M18-24</option>
            <option value='M25-29'>M25-29</option>
            <option value='M30-34'>M30-34</option>
            <option value='M35-39'>M35-39</option>
            <option value='M40-44'>M40-44</option>
            <option value='M45-49'>M45-49</option>
            <option value='M50-54'>M50-54</option>
            <option value='M55-59'>M55-59</option>
            <option value='M60-64'>M60-64</option>
            <option value='M65-69'>M65-69</option>
            <option value='M70-74'>M70-74</option>
            <option value='M75-79'>M75-79</option>
            <option value='M80-84'>M80-84</option>
            <option value='M85-89'>M85-89</option>
            <option value='MHC'>MHC</option>
            <option value='MPC/ID'>MPC/ID</option>
            <option value='MPRO'>MPRO</option>
        </select>

        Selecionar por modalidade
        <select name="modalidade">
            <option value="none">None</option>
            <option value='Run_Rank'>Run</option>
            <option value='Swim_Rank'>Swim</option>
            <option value='Bike_Rank'>Bike</option>
        </select>

        Selecionar por pais
        <select name="pais">
            <option value="none">None</option>
            <option value="Germany">Germany</option>
            <option value="Denmark">Denmark</option>
            <option value="United States">United States</option>
            <option value="France">France</option>
            <option value="Netherlands">Netherlands</option>
            <option value="Italy">Italy</option>
            <option value="Australia">Australia</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="South Africa">South Africa</option>
            <option value="Poland">Poland</option>
            <option value="New Zealand">New Zealand</option>
            <option value="Spain">Spain</option>
            <option value="Sweden">Sweden</option>
            <option value="Belgium">Belgium</option>
            <option value="Austria">Austria</option>
            <option value="Canada">Canada</option>
            <option value="Estonia">Estonia</option>
            <option value="Norway">Norway</option>
            <option value="China">China</option>
            <option value="Brazil">Brazil</option>
            <option value="Hungary">Hungary</option>
            <option value="Mexico">Mexico</option>
            <option value="Chile">Chile</option>
            <option value="Finland">Finland</option>
            <option value="Switzerland">Switzerland</option>
        </select>

        Selecionar primeiros ou ultimos
        <select name="top_down" id="">
            <option value="asc">primeiros</option>
            <option value="desc">ultimos</option>
        </select>

        Quatidade de linhas
        <input type="number" name='quantidade_linhas'>

        <input type="submit" value='fazer busca' name='busca'>
    </form>

    <br>

    <form action="" method="post">
        Atletas Brasileiros
        <input type="submit" value='fazer busca' name='busca1'>
        <br>

        Paises e numero de atletas
        <input type="submit" value='fazer busca' name='busca2'>
        <br>

        MPRO
        <input type="submit" value='fazer busca' name='busca3'>
        <br>

        Melhor BR
        <input type="submit" value='fazer busca' name='busca4'>
        <br>
    </form>

    <?php   
        require_once("functions.php");

        if (isset($_POST['all'])) {
            printTable(selectFromTable(["*"], "", "", "", ""));
        }

        else if (isset($_POST['busca'])) {
            $whereClause = "";

            if ($_POST['pais'] != "none") {
                $whereClause .= "Country=" . '\'' . $_POST['pais'] . '\'';
            }

            if ($_POST['divisao'] != "none") {
                if (!empty($whereClause)) {
                    $whereClause .= " and ";
                }

                $whereClause .= "Division=" . '\'' . $_POST['divisao'] . '\'';
            }

            if ($_POST['modalidade'] != "none") {
                if (!empty($whereClause)) {
                    $whereClause .= " and ";
                }
                
                switch ($_POST['modalidade']) {
                    case 'Run_Rank':
                        $whereClause .= "Run_Rank is not null";
                        break;

                    case 'Swim_Rank':
                        $whereClause .= "Swim_Rank is not null";
                        break;

                    case 'Bike_Rank':
                        $whereClause .= "Bike_Rank is not null";
                        break;
                }
            }

            printTable(selectFromTable(["*"], 'Finish_Status desc, Division_Rank ' . $_POST['top_down'], $whereClause, $_POST['quantidade_linhas'], ""));
        }

        else if (isset($_POST['busca1'])) { 
            printTable(selectFromTable(["count(*) as 'Brasilian athletes'"], 'Finish_Status desc, Division_Rank asc', "Country='Brazil'", "", ""));
            printTable(selectFromTable(["*"], 'Finish_Status desc, Division_Rank asc', "Country='Brazil'", "", ""));
        }

        else if (isset($_POST['busca2'])) { 
            printTable(selectFromTable(["count(*) as 'Athletes'", "Country"], "", "", "", "Country"));
        }

        else if (isset($_POST['busca3'])) { 
            printTable(selectFromTable(["Name", "Country", "Overall_Rank", "Swim_Rank", "Swim_Time", "Bike_Rank", "Bike_Time", "Run_Rank", "Run_Time", "(Overall_Rank - Swim_Rank) AS Swim_Rank_Diff", "(Overall_Rank - Bike_Rank) AS Bike_Rank_Diff", "(Overall_Rank - Run_Rank) AS Run_Rank_Diff"], "Finish_Status desc, Division_Rank asc", "Division = 'MPRO'", "", ""));
        }
    ?>
</body>
</html>
