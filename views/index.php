
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" onclick="location.href='index.php'">graproject</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>

                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a onclick="location.href='mypage.php'"><i class="fa fa-user fa-fw"></i> Mypage</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">


                              <form class="" action="search.php" method="post" >
                                  <input type="text" class="form-control" name="search"  placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                                </span>
                              </form>

                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                          <a onclick="location.href='index.php'"><i class="fa fa-dashboard fa-fw"></i> list</a>
                        </li>

                        <li>
                            <a onclick="location.href='image.php'"><i class="fa fa-table fa-fw"></i>image</a>
                        </li>
                        <li>
                            <a href="forms.php"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>


                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="page-header">List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- <div class="btn-group" role="group" aria-label="Basic example">
              <button onclick="location.href='company.php'" type="button" class="btn btn-secondary">회사명순</button>
              <button onclick="location.href='index.php'" type="button" class="btn btn-secondary">이름순</button>
              <button onclick="location.href='regist.php'" type="button" class="btn btn-secondary">등록일순</button>
            </div> -->

            <div class="row">
                <div class="col-lg-10">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">이름</th>
                        <th scope="col">전화번호</th>
                        <th scope="col">주소</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                          /* Load DB */
                          $conn = mysqli_connect('localhost', 'root', 'apmsetup', 'testphp');
                          if ( !$conn ) die('DB Error');

                          /* Set to UTF-8 Encoding */
                          mysqli_query($conn, 'set session character_set_connection=utf-8;');
                          mysqli_query($conn, 'set session character_set_results=utf-8;');
                          mysqli_query($conn, 'set session character_set_client=utf-8;');

                          /* Load data */
                          $query = 'SELECT * FROM members';
                          $result = mysqli_query($conn, $query);

                          while( $row = mysqli_fetch_array($result) ) {
                            $datetime = explode(' ', $row['b_date']);
                            $date = $datetime[0];
                            // $time = $datetime[1];
                            // if($date == Date('Y-m-d'))
                            //   $row['b_date'] = $time;
                            // else
                            //   $row['b_date'] = $date;
                              // echo "<a href='delete.php?b_name=".$row['b_name']."'>삭제하기</a>";
                              // echo "<hr>";
                          // mysqli_close($conn);

                       ?>
                       <tr>

                					<td><?php echo $row['name']?></a></td>
                					<td><?php echo $row['phoneNum']?></td>
                					<td><?php echo $row['address']?></td>
                			
                          <td><?php echo "<a href='edit.php?name=".$row['name']."'>수정하기</a>";?></td>
                          <td><?php echo "<a href='delete.php?name=".$row['name']."'>삭제</a>";?></td>

                				</tr>

                       <?php

                     }
                     ?>
                     </tbody>

                  </table>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
