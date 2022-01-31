<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
    <link href="style.css" rel="stylesheet" type="text-css" />

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="./assets/main.js" defer></script>
</head>
<body>
    <?php require_once('./includes/db.php'); ?>
    <?php require_once('./includes/functions.php') ?>

    <?php var_dump($_POST); ?>

    <div class="container d-flex flex-column align-items-center w-75 my-5 py-5 border border-success">
    
        <?php 
            $output = array();

            foreach($survey as $i => $el) {
                foreach($_POST as $post) {
                    if(in_array($post, $el['answers'])) {
                        $answer_key = array_search($post, $el['answers']);
                        $el['answer'] = $answer_key;   
                    }
                }
                array_push($output, $el);    
            }
            
            $survey_output = file_put_contents('./assets/output-data.json',json_encode($output));
            
            var_dump($output);
        ?>
    
    </div>
</body>
</html>