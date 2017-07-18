<?php
include_once('../common/protect.php');
include_once('../common/config.php');
include_once('../common/opendb.php');

$query = "SELECT * 
          FROM kkwinch_content WHERE id <> 237 
          ORDER BY id 
          LIMIT 1000";

$result = mysql_query($query);

//
// Load all the results into the row array
//
while ($row = mysql_fetch_array($result))
{
  //
  // Wrap the row array in a parent array, using the id as they key
  // Load the row values into the new parent array
  //
  $categories[$row['id']] = array(
    'id' => $row['id'], 
    'title' => $row['title'], 
    'parent_id' => $row['parent_id']
  );
}


// print '<pre>';
// print_r($category_array);

// ----------------------------------------------------------------

//
// Create a function to generate a nested view of an array (looping through each array item)
//
function generate_tree_list($array, $parent = 0, $level = 0)
{

  //
  // Reset the flag each time the function is called
  //
  $has_children = false;

  //
  // Loop through each item of the list array
  //
  foreach($array as $key => $value)
  {
    //
    // For the first run, get the first item with a parent_id of 0 (= root category)
    // (or whatever id is passed to the function)
    //
    // For every subsequent run, look for items with a parent_id matching the current item's key (id)
    // (eg. get all items with a parent_id of 2)
    //
    // This will return false (stop) when it find no more matching items/children
    //
    // If this array item's parent_id value is the same as that passed to the function
    // eg. [parent_id] => 0   == $parent = 0 (true)
    // eg. [parent_id] => 20  == $parent = 0 (false)
    //
    if ($value['parent_id'] == $parent) 
    {                   

      //
      // Only print the wrapper ('<ul>') if this is the first child (otherwise just print the item)      
      // Will be false each time the function is called again
      //
      if ($has_children === false)
      {
        //
        // Switch the flag, start the list wrapper, increase the level count
        //
        $has_children = true;  

        print "<ul class=\"level-" . $level . "\">\n";

        $level++;
      }

      //
      // Print the list item
      //
      print "<li><a href=\"?id=" . $value['id'] . "\">" . $value['title'] . "</a>";

      //
      // Repeat function, using the current item's key (id) as the parent_id argument
      // Gives us a nested list of subcategories
      //
      generate_tree_list($array, $key, $level); 

      //
      // Close the item
      //
      print "</li>\n";


    }

  }

  //
  // If we opened the wrapper above, close it.
  //
  if ($has_children === true) echo '</ul>';


}

// ----------------------------------------------------------------

//
// generate list
//
generate_tree_list($categories);


?>