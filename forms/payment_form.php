<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healthcare</title>
    <link rel="stylesheet" href="../styles/main_style.css">
    <link rel="stylesheet" href="../styles/payment.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/artboard_1_9X7_icon.ico" />
</head>

<body>
    <div class="container">
            <div class="main-content">
                <header class="header-main">
                    <div class="wrapper">
                        <section class="logo">
                            <h1>Healthcare Appointment System</h1>
                        </section>
                        <nav class="nav-horizontal" id="topnav">
                            <a href="../index.php">Home</a>
                            <a href="check_patient_appointments.php">Back</a>
                        </nav>
                    </div>
                </header>
                <main>
                    <article class="article-one">
                        <h1>Payment Page</h1>
                        <form id="payment-form" action='../php_scripts/payment.php' method='POST'>
                            <label for="card-number">Card Number:</label>
                            <input type="text" id="card-number" placeholder="1234 5678 9012 3456" pattern="[0-9]{16}" maxlength="16" required>
                            <br>
                            <label for="expiry">Expiry Date:</label>
                            <input type="text" id="expiry" placeholder="MM/YY" required>
                            <br>
                            <label for="cvv">CVV:</label>
                            <input type="text" id="cvv" placeholder="123" pattern="[0-9]{3}" maxlength="3" required>
                            <br>
                            <label for="amount">Amount:</label>
                            <?php
                            require_once('../php_scripts/connect.php');
                            $doc_id = $_POST['doctor_id'];
                            $pat_id = $_POST['patient_id'];
                            $test = $_POST['test_name'];
                            $total = $_POST['total_charge'];
                            ?>
                            <input type='hidden' name='doctor_id' value="<?php echo $doc_id; ?>">
                            <input type='hidden' name='patient_id' value="<?php echo $pat_id; ?>">
                            <input type='hidden' name='test_name' value="<?php echo $test; ?>">
                            
                            <input type="text" id="amount" placeholder="$" value="<?php echo '$' . $total; ?>" disabled>
                            <br>
                            <button id="pay-button" type="submit">Pay Now</button>
                        </form>
                    </article>
                </main>
                </div>
            </div>
        </div>
    </div>
</body>
</html>