<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    <div id="content">
    <h1>Future Value Calculator</h1>
    <?php if (!empty($error_message)) { ?>
    <div class="error"><?php echo $error_message; ?></div>
    <?php } // end if ?>
    <form action="display_results.php" method="post">

        <div id="data">
            <label>Investment Amount:</label>
            <input type="text" name="investment"
                   value="<?php 
                            if(empty($_POST))
                                $investment = rand(1, 100);
                            echo $investment;
                          ?>"/><br />

            <label>Yearly Interest Rate:</label>
            <input type="text" name="interest_rate"
                   value="<?php 
                            if(empty($_POST))
                                $interest_rate = rand(1, 15);
                            echo $interest_rate;
                          ?>"/><br />

            <label>Number of Years:</label>
            <input type="text" name="years"
                   value="<?php 
                            if(empty($_POST))
                                $years = rand(1, 50);
                            echo $years;
                          ?>"/><br />
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate"/><br />
        </div>

    </form>
    </div>
</body>
</html>