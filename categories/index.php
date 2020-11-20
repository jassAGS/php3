<?php
    include "../app/categoryController.php";
    $categoryController = new
    CategoryController();

    
    $categories = $categoryController->get();
    echo json_encode($categories);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    
    <div>
        <table>
            <thead>
                <th>
                    id
                </th>
                <th>
                    nombre
                </th>
                <th>
                desc
                </th>
                <th>
                
                </th>
                <tbody>
                    
                    <?php
                        foreach ($categories as $category){
                            echo "<tr>
                            
                        <td>
                            ".$category['id']."
                        </td>
                        <td>
                        ".$category['name']."
                        </td>
                        <td>
                        ".$category['description']."
                        </td>
                        
                        </tr>";
                        }
                        

                    ?>

                </tbody>
            </thead>
        </table>
        <div>
        
        <<form action="../app/categoryController.php" method="POST">
            <fieldset>

                <legend>
                    Add new Category
                </legend>

                <label>
                    Name
                </label>
                <input type="text"  name="name" placeholder="terror" required=""> 
                <br>

                <label>
                    Description
                </label>
                <textarea placeholder="write here" name="description" rows="5" required=""></textarea>
                <br>

                <label>
                    Status
                </label>
                <select name="status">
                    <option> active </option>
                    <option> inactive </option>
                </select>
                <br>

                <button type="sumbit" >Save Category</button>
                        <input type="hidden" name="action" value="store">
                        
            </fieldset>
        </form>
        </div>
    </div>
</body>
</html>