<?php


include_once dirname(__FILE__, 2) . "\\utils\\iniclude_utils_files.php";

/**
 * @author Hassan
 * @return array
 */
function searchForProfessor()
{
    global $professorsTable, $rowsPerPage, $professor_name, $professor_email, $professor_phone, $countRows;

    if (isset($_POST['submit'])) {
        $professor_name = $_POST['professor-name'];
        $professor_email = $_POST['professor-email'];
        $professor_phone = $_POST['professor-phone'];

        $mainSqlQuery = "SELECT p.*, u.* 
                FROM {$professorsTable} p 
                join users u 
                    on p.id_user = u.id
                    WHERE u.first_name LIKE '%$professor_name%' AND u.email LIKE '%$professor_email%' AND u.mobile_number LIKE '%$professor_phone%'
                    ORDER BY u.first_name;";

        $dataBaseConnection = connectToDataBase();
        $resultQuery = mysqli_query($dataBaseConnection, $mainSqlQuery);
        checkResultQuery($resultQuery, $dataBaseConnection, __FUNCTION__);
        $dataBaseConnection->close();

        $professorsData = array();
        $countRows = 0;

        while ($row = $resultQuery->fetch_assoc()) {
            $professorsData[$countRows++] = $row;
        }

        $countRows  = ceil($countRows / $rowsPerPage);


        return $professorsData;
    }
}



/**
 * @author Hassan
 * @param array $professorsData
 */
function showProfessorSearch($professorsData)
{
    global $professorsType;
    printCommonData($professorsData, $professorsType);
}
