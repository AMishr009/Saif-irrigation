<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Crops</title>
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
    label{
        color: #fb6b49;
        font-weight: 500;
    }
    .top_line{
        width: 100%;
        height:50px;
        background-color:#fb6b49;
        margin: 10px 0px 10px 0px; 
        border-radius: 10px;
    }
    .btn_orange{
        width:100px;
        border-radius: 50px;
        padding : 10px;
        background-color:#fb6b49; 
        border: none;
        color: white; 
    }
    table th{
        color:#3371dc; 
        font-weight: 500;
        padding: 10px;
    }
</style>

</head>
<body>
    <div class="container-fluid">
        <!-- <div class="top_line"></div> -->
    <div class="row mt-5">
        <div class="col-lg-2">
        <!-- <h2>Sidebar</h2> -->
        <?php include "new-sidebar.php";?>
        </div>


        <div class="col-lg-10 mt-lg-5 mt-3">
        <section class="table_content">
        <div class="row">
        <div class="col-lg-7">
<form action="">
    <div class="m-3 d-flex">
        <label for="" class="col-lg-2 form-label float-end">S. No.</label>
        <input type="number"class="form-control">
    </div>
    <div class="m-3 d-flex">
        <label for="" class="col-lg-2 form-label">Crop Name</label>
        <input type="text" class="form-control">
    </div>
    <div class="m-3 d-flex">
        <label for="" class="col-lg-2 form-label">Crop Stage</label>
        <input type="text" class="form-control">
    </div>
    <div class="m-3 d-flex">
        <label for="" class="col-lg-2 form-label">Ca</label>
        <input type="text" class="form-control">
    </div>
    <div class="m-3 d-flex">
        <label for="" class="col-lg-2 form-label">K</label>
        <input type="text" class="form-control">
    </div>
    <div class="m-3 d-flex">
        <label for="" class="col-lg-2 form-label">Mg</label>
        <input type="text" class="form-control">
    </div>
    <div class="m-3 d-flex">
        <label for="" class="col-lg-2 form-label">N</label>
        <input type="text" class="form-control">
    </div>
    <div class="m-3 d-flex">
        <label for="" class="col-lg-2 form-label">P</label>
        <input type="text" class="form-control">
    </div>
</form>

</div>
</div>
<div class="d-flex flex-row justify-content-center align-items-center mt-5 align-center">
<button class="btn_orange ms-2">Create</button>
<button class="btn_orange ms-2">Update</button>
<button class="btn_orange ms-2">Cancel</button>
</div>
    </section>


        </div> <!-- Col-lg-9 close -->




    </div>
    
    

</div> <!-- End of Container-Fluid -->
    
<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Page Specific JS -->
<script src="assets/js/app.js"></script> 

<!-- Javascript -->          
<script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script> 

</body>
</html>
