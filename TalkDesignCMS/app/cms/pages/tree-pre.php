<?php
include_once('../common/config.php');
include_once('../common/opendb.php');

/**
 * Fetches all the projects and returns them as an array.
 * "Projects" meaning: tasks without a parent.
 * @return array
 */
function getProjects() {
    $sql = "SELECT id FROM kkwinch_content";
    $result = mysql_query($sql) or die(mysql_error());
    $results = array();
    while($row = mysql_fetch_assoc($result)) {
        $results[] = $row['id'];
    }
    return $results;
}

/**
 * Fetches all tasks belonging to a specific parent.
 * Adds HTML space entities to represent the depth of each item in the tree.
 * @param int $parent_id The ID of the parent.
 * @param array $data An array containing the dat, filled in by the function.
 * @param int $current_depth Indicates the current depth of the recursion.
 * @return void
 */
function getTasks($parent_id, &$data, $current_depth=1) {
    $sql = "SELECT * FROM kkwinch_content WHERE parentid = {$parent_id}";
    $result = mysql_query($sql) or die(mysql_error());
    while($row = mysql_fetch_assoc($result)) {
        $data[] = str_repeat('&nbsp;', $current_depth) . '- ' . $row['id'];
        getTasks($row['id'], $data, $current_depth + 1);
    }
}



// Get all the projects, adding a "-" as the initial value of the box.
$projects = array_merge(array('-'), getProjects());

// Fetch the tasks.
// If no project has been selected, just show a "please select"
$tasks = array();
if(isset($_GET['project']) && $_GET['project'] != '-') {
    getTasks($_GET['project'], $tasks);
}
else {
    $tasks = array('Select a project');
}

mysql_close();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Tree Select Example</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <select name="project" onchange="this.parentNode.submit();">
            <?php
            foreach($projects as $_project) {
                $selected = ($_project == @$_GET['project']) ? ' selected' : '';
                echo "<option value=\"{$_project}\"{$selected}>{$_project}</option>";
            }
            ?>
        </select><br>
        <select name="tasks[]" multiple size="10">
            <?php
            foreach($tasks as $_task) {
                echo "<option value=\"{$_task}\">{$_task}</option>";
            }
            ?>
        </select><br>
        <input type="submit">
    </form>
    <pre><?php print_r($_GET); ?></pre>
</body>
</html>
