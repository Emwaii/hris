<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/png" href="<?= base_url('assets/img/icon.png')?>" >
<?php $this->load->view("guest/_partials/head.php") ?>

<style type="text/css">
.bg-col{
    /* background-position:center;
    background-image: url(../assets/img/guest/bg2.png); */
    background-color: #f9f9f7;
    opacity:0.97;  
}
.btnn {
    display: inline-block;
    font-weight: 400;
    color: white;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: #a80231;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.35rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.btnn:hover{
    color: solid #5f5d7e;
}
.bg-col3{
    background: linear-gradient(to bottom right, #014871,#d7ede2) ;
    height: 100%;
    margin: 0;
    background-repeat: no-repeat;
    background-attachment: fixed;
    /* background-color : #000000; */
}
.bg-col4{
    background-color: #a80231;    
}
.bg-col5{
    background-color: #212529;
}

input[type=text] {
    width:100%;
    height: calc(1.5em + 0.75rem + 1.2rem);
    border: none;
    border-radius:0;
    border-bottom: 2px solid grey;
    color: black;
}
input[type=text]:hover{
    border-bottom: 2px solid #3f3d56;
}
textarea:hover{
    border-bottom: 2px solid #3f3d56;

}
#content-wrapper {
    display: block;
    background-image: url(../assets/img/guest/free.png);
    /* background-image: url(../assets/img/guest/238870.jpg); */
    background-repeat: no-repeat;
    width: 100%;
    background-position: center;
    background-size: cover;
}
.custom-file-upload{
  background: #f7f7f7; 
  padding: 8px;
  border: 1px solid #e3e3e3; 
  border-radius: 5px; 
  border: 1px solid #ccc; 
  display: inline-block;
  padding: 6px 12px;
  cursor: pointer;
}   
hr.style2 {
	height: 10px;
	border: 0;
	box-shadow: 0 10px 10px -10px #8c8b8b inset;
}
.alert-success {
    color: #0f6848;
    background-color: #d2f4e8;
    border-color: #bff0de;
    width: 654px;
}
</style>

<?php $this->load->view("guest/_partials/navbar.php") ?>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PT. STAR Software Indonesia</title>

    <!-- Bootstrap core CSS-->  
    <link href="<?php echo base_url('assets/img/guest/sb-admin-2.min.css') ?>" rel="stylesheet">
</head>

<body id="page-top ">

	<div id="wrapper" >

		
		<div id="content-wrapper">

			<div class="container-fluid">
            
				
				<!-- DataTables -->
				
					
                <div class="container">
                <?php if ($this->session->flashdata('success')): ?>
				<center>
                <div class="alert alert-success" role="alert">
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>

					<?php echo $this->session->flashdata('success') ; ?>
				</div>
                </center>
				<?php endif; ?>
                <div class="row mt-5">
                    <div class="col-12 col-md-7 mx-auto bg-col p-5" style=" border-radius:10px;">
                    <?php echo form_open_multipart('guest/freelance');?>

						<form action="<?php base_url('guest/freelance') ?>" method="post" enctype="multipart/form-data " >
                            <center><h3>JOIN US</h3></center>    
                             <div class="form-group mt-4">
                                <!-- <label for="email"></label> -->
                                <input type="text" class="form-control bg-transparent border-right-0 border-left-0 border-top-0 " name="fullname" placeholder="Fullname" required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control bg-transparent border-right-0 border-left-0 border-top-0 " name="email" placeholder="Email" required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control bg-transparent border-right-0 border-left-0 border-top-0 " name="nowa" placeholder="No. Whatsapp" required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control bg-transparent border-right-0 border-left-0 border-top-0 " name="age" placeholder="Age" required />
                            </div>
                            <div class="form-group">
							<select required class="form-control bg-transparent border-right-0 border-left-0 border-top-0"  style="height: 55px;border-radius: 0;border-bottom: 2px solid grey;color:black;" name="jname" id="jname"  >
								<option disable selected value="">Choose One...</option>
								<?php foreach ($jobs as $jb) {?>									
								<option value="<?php echo $jb->id_job ?>"><?php echo ucfirst($jb->jobs_name) ?></option>
								<?php } ?>
							</select>
                            </div>	
                            <div class="form-group">
							<select class="form-control bg-transparent border-right-0 border-left-0 border-top-0"  style="height: 55px;border-radius: 0;border-bottom: 2px solid grey;color:black;" name="lname" id="lname" hidden >
								<option disable selected>Choose One...</option>
								<?php foreach ($lang as $lg) {?>									
								<option value="<?php echo $lg->id_lang ?>"><?php echo ucfirst($lg->language) ?></option>
                               
								<?php } ?>
                                <!-- <option value="others">Others</option> -->
							</select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control bg-transparent border-right-0 border-left-0 border-top-0 " name="others" placeholder="Write here.." id="others" hidden />
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-6">
                                <label for="cv" class="custom-file-upload" id="cv-label">
                                Upload CV Here
                                </label>
                                <input name="uploadDocument" type="file" id="cv" 
                                accept=".jpg,.jpeg,.pdf,doc,docx,application/msword,.png" style="display: none;" />
                               </div>

                               <div class="col-md-6">
                                <label for="portofolio" class="custom-file-upload" id="portofolio-label">
                                Upload Portofolio Here
                                </label>
                                <input name="uploadDocument" type="file" id="portofolio" 
                                accept=".jpg,.jpeg,.pdf,doc,docx,application/msword,.png" style="display: none;" />
                               </div>
                            </div> -->
                           
                            <div class="row  p-2">
                                <div class="col-md-6 mr-1">
                                    <label for="cv">Upload CV Here</label>
                                    <input class="form-control-file  " type="file" name="cv" id="cv" accept=".pdf" required>
                                    <sub><?= "<font color ='red'>*</font>"?>format .pdf</sub>
                                </div>
                                <div class="col-md-5">
                                <label for="portofolio">Upload Portofolio Here</label>
                                    <input class="form-control-file  " type="file" name="portofolio" accept=".pdf" id="portofolio" required>
                                    <sub><?= "<font color ='red'>*</font>"?>format .pdf</sub>
                                </div>
                            </div>
                            
                            <div class="form-group mt-3">
                                
                                <textarea class="form-control bg-transparent border-right-0 border-left-0 border-top-0"  
                                style="height: 70px;border-radius: 0;border-bottom: 2px solid grey;color:black;"name="alasan" 
                                placeholder="Why should we consider you?" required></textarea>
                            </div>
                            <div class="form-group mb-5">
                                <input type="submit" name="submit" class="btnn w-100" value="Submit" />
                            </div>

                        </form>
                    </div>
                </div>
            </div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->

		</div>
		<!-- /.content-wrapper -->

	
	<!-- /#wrapper -->

	<?php $this->load->view("guest/_partials/scrolltop.php") ?>
	<?php $this->load->view("guest/_partials/modal.php") ?>

	<?php $this->load->view("guest/_partials/js.php") ?>
    <script src="<?php echo base_url('css/bootstrap-filestyle.min.js') ?>"></script>
    <script src="<?php echo base_url('css/jquery-input-file-text.js') ?>"></script>
	<script>
    $('#jname').change(function(){
    var theVal = $(this).val();
    switch(theVal){
    case '1':
        $('#lname').prop('hidden', false);
    break;
    case '2':
        $('#lname').prop('hidden', false);
    break;
    case '3':
        $('#lname').prop('hidden', true);
        $('#others').prop('hidden', true);
    break;
    case '4':
        $('#lname').prop('hidden', true);
        $('#others').prop('hidden', true);
    break;
    case '5':
        $('#lname').prop('hidden', false);
    break; 
    case '6':
        $('#lname').prop('hidden', false);
    break; 
    default:
        $('#lname').prop('hidden', true);
     $('#others').prop('hidden', true);
     break;
    }
    });
    $('#lname').change(function(){
    var theVal = $(this).val();
    switch(theVal){
    
    case '11':
        $('#others').prop('hidden', false);
    break; 
    default:
     $('#others').prop('hidden', true);
     break;
    }
    });

	</script>
   <script>
       $(".alert").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });
   </script>
    <!-- <script>
    $(document).ready(function () {
        $('#cv').change(function () {
            var i = $(this).prev('label').clone();
            var file = $('#cv')[0].files[0].name;
            $(this).prev('label').text(file);
        }); 
    });

    $(document).ready(function () {
        $('#portofolio').change(function () {
            var i = $(this).prev('label').clone();
            var file = $('#portofolio')[0].files[0].name;
            $(this).prev('label').text(file);
        }); 
    });
    </script> -->
</body>


</html>