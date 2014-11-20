<?php
if (isset($_POST['tasklist'])) {
    $task_list = $_POST['tasklist'];
} else {
    $task_list = array();

    // some hard-coded starting values to make testing easier
    $task_list[] = 'Write chapter';
    $task_list[] = 'Edit chapter';
    $task_list[] = 'Proofread chapter';
}

$errors = array();

switch( $_POST['action'] ) {
    case 'Add Task':
        $new_task = $_POST['newtask'];
        if (empty($new_task)) {
            $errors[] = 'The new task cannot be empty.';
        } else {
            array_push($task_list, $new_task);
        }
        break;
    case 'Delete Task':
        $task_index = $_POST['taskid'];
        unset($task_list[$task_index]);
        $task_list = array_values($task_list);
        break;

    case 'Modify Task':
        $task_to_modify = $task_list[$_POST['taskid']];
        break;
   
    case 'Save Changes':
        $task_list[array_search($_POST['modifiedtaskid'], $task_list)] = $_POST['modifiedtask'];
        break;
    
    case 'Cancel Changes':
        break;
     
    case 'Promote Task':
        $task_index = $_POST['taskid'];
        if($task_index > 0)
        {
            $item = array_splice($task_list, $task_index, $task_index);
            array_unshift($task_list, $item[0]);
            
        }
        else
        {
            echo "Can't promote the first item.";
        }
        break;
    
    case 'Sort Tasks':
        sort($task_list);
        break;
    
}

include('task_list.php');
?>