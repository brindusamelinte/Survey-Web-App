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

    <div class="container d-flex flex-column align-items-center w-50 my-5 py-5">
        
        <div class="w-50">
            <form method="post" action="survey-results.php">
                <?php foreach($survey as $i => $el) { ?>
                    <div id="question-card" class="<?php echo $i == 0 ? 'd-flex flex-column' : 'd-none'; ?>">
                        <p id="question-<?php echo $i; ?>" class="align-self-center"><?php echo $el['question']; ?></p>   
                        <div class="align-self-center">           
                            <?php foreach($el['answers'] as $key => $answer) { ?>
                                <div class="form-check">
                                    <input id="answer-<?php echo $key; ?>" class="form-check-input" type="radio" name="answer-for-question-<?php echo $i; ?>"  value="<?php echo $answer; ?>" />
                                    <label class="form-check-label" for="answer-<?php echo $key; ?>"><?php echo $answer; ?></label>
                                </div>
                            <?php }; ?> 
                            <?php if($i+1 == count($survey)) { ?>   
                                <input class="w-25 my-4" type="submit" value="Submit">
                            <?php }; ?>
                        </div> 
                    </div>
                <?php }; ?>
            </form> 
        </div>

        <div class="w-50 d-flex flex-row justify-content-center">
            <div class="mx-2 my-4">
                <button type="button" id="arrow-left" class="btn btn-secondary btn-sm" <?php echo $survey[0] ? 'disabled' : ''; ?>><i class='fas fa-long-arrow-alt-left'></i></button>
            </div>
            <div class="mx-2 my-4">
                <button type="button" id="arrow-right" class="btn btn-secondary btn-sm" disabled <?php //echo $survey[count($survey)-1] ? 'disabled' : ''; ?>><i class='fas fa-long-arrow-alt-right'></i></button>
            </div>
        </div>
    
    </div>
    
</body>
</html>