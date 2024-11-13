<!DOCTYPE html>

<html>
<head>
    <title>Resultados Kona-2024</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" method='post'>
        <input type="submit" value="Mostrar toda tabela" name='all'>
        <br>

        Selecionar por categoria
        <select name="divisao">
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

        Selecionar primeiros ou ultimos
        <select name="top/down" id="">
            <option value="top">primeiros</option>
            <option value="down">ultimos</option>
        </select>

        Quatidade de linhas
        <input type="number" name='quantidade_linhas'>
        <input type="submit" value='fazer busca'>
    </form>

    <?php   
        require_once("functions.php");

        $column_names = ['Bib', 'Name', 'Country', 'Gender', 'Division', 'Division Rank', 'Overall Time', 'Overall Rank', 'Swim Time', 'Swim Rank', 'Bike Time', 'Bike Rank', 'Run Time', 'Run Rank', 'Finish Status', 'P'];
        
        if (isset($_POST['all'])) {
            // echo selectFromTable(["*"], "", "", "");
            printTable(selectFromTable(["*"], "", "", 10), $column_names);
        }
    ?>
</body>
</html>
