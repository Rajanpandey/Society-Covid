<?php
include('header.php');
include('tenant.php');
require('connect.php');
require('viewsCounter.php');

updateViewCount('feedback');

if(isset($_POST['saveFeedback'])) {
    $feedback = mysqli_real_escape_string($conn, trim($_POST['feedback']));
    $query = "INSERT INTO feedback (feedback, t_id) VALUES ('$feedback', '$t_id')";
    if(mysqli_query($conn, $query)) {
        echo "<script type=\"text/javascript\"> alert('Thank you for the feedback!'); location.href = 'feedback.php'; </script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback - Contact Me</title>
    <link href="../css/footer.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <br/>
                <a href="home.php" class="btn btn-danger ">Return back to Home</a>
                <h3 class="ml-4 mt-3">Submit feedback/suggestions etc:</h3>
                <form action="" method="POST">
                    <div class="form-group">
                        <textarea class="form-control ml-3 mb-3" rows="2" name="feedback" required></textarea>
                        <button type="submit" name="saveFeedback" class="btn btn-success ml-3"><i class="fas fa-comment-alt"></i>&nbsp; Submit Feedback</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>Made with ❤️ by Rajan</p>
    </div>
</body>
</html>
