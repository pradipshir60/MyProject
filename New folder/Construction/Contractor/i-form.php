<?php
session_start();
if (isset($_SESSION['contractor_id'])) {
    include "header.php";
    include "../connection.php";

    $form_id = $_GET['form_id'];

    $con = new mysqli($host, $user, $password, $dbname, $port)
        or die('Could not connected to the database server ' . mysqli_connect_error());

    $query = "SELECT * FROM interior_tender WHERE interior_form_id=" . $form_id;
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
?>

        <div class="container-fluid" id="container-wrapper" style="margin-bottom: 12%">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Upload Tender</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">e-tender</li>
                    <li class="breadcrumb-item" aria-current="page">New Tender Application</li>
                    <li class="breadcrumb-item active" aria-current="page">e-Tender</li>
                </ol>
            </div>

            <form method="POST" action="i-form_submit.php" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="form_id" value="<?php echo $form_id ?>">

                    <div class="custom-file" style="width: 50%; margin: auto">
                        <input type="file" class="custom-file-input" id="customFile" name="pdf_file" required>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>

                    <input type="submit" style="width: auto; margin-top: 5%;" class="form-control btn btn-block btn-warning" value="Submit">
                </div>
            </form>
        </div>
        </div>

        <script>
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        </script>

<?php
    }
    include "footer.html";
} else {
    echo "Session Timed Out!!!";
    exit();
}

?>