<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	
	<link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
	<title>Proweb IF</title>
</head>

<body>
	<?php session_start();	?>
	<div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
				<img src="img/Logo-Web-ITK.png" alt="itk" id="itk">
				<h3>INFORMATIKA</h3>
            </div>
            <ul class="list-unstyled components">
				<p id="iduser">ID : <?php echo $_SESSION["username"];?></p>
				<p>MENU</p>
				<li>
					<a class="nav-link" href="index.php">Home</a>
				</li>
                <li>
                    <a href="#Data" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Data</a>
                    <ul class="collapse list-unstyled" id="Data">
						<li class="nav-item">
							<a class="nav-link" href="?f=dosen_index">Data Dosen</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="?f=student_index">Data Mahasiswa</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="?f=subject_index">Data Matakuliah</a>
						</li>
					</ul>
				</li>
				<li>
                    <a href="#Proses" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">proses</a>
                    <ul class="collapse list-unstyled" id="Proses">
						<li class="nav-item">
							<a class="nav-link" href="?f=frsmhs_index">Formulir Rencana Studi</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="?f=payment_index">Pembayaran</a>
						</li>
					</ul>
				</li>	
				<li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>

            
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            
                            <li class="nav-item">
								<?php
								//isset akan mengecek apakah variabel ada isinya atau tidak 
								//dalam hal ini variabel $_SESSION["username"] diinisiasi/diisikan value-nya waktu proses login
								//sehingga dipakai untuk mengecek apakah sudah login atau belum.
								//kl variabel $_SESSION["username"] kosong berarti belum login sehingga tdk akan ditampilkan link logout
								if (isset($_SESSION["username"])) {
									echo "<a class='nav-link' id='logout' href='?f=logout'>Logout</a>";
								}else{
									header("Location: login.php");
								}
								?>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <?php
			if (isset($_GET['f'])) {
				$file = $_GET['f'];
				if (file_exists("$file.php")) {
					include_once "$file.php";
				} else {
					echo 'File Tidak ada</b>';
				}
			} else {
				?><h1>Selamat Datang di Kelas Proweb IF</h1>
				<div class="content">
					<img id="homeimg" src="img/home.png" alt="home">
				</div><?php
			}
			
			
			?>

        </div>
    </div>

	
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
			$('#dtVerticalScrollExample').DataTable({
			"scrollY": "200px",
			"scrollCollapse": true,
			});
			$('.dataTables_length').addClass('bs-select');
        });
	</script>

	<br>

	
</body>

</html>