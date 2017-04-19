<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $this->page;?></title>
	<link rel="stylesheet" href="/storypub.dev/pub/css/bootstrap.min.css">
        <script type="text/javascript" src="/storypub.dev/pub/js/app.js"></script>
        <script type="text/javascript" src="/storypub.dev/pub/js/jquery.md5.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
  
        
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
<body>
    
   <nav class="navbar navbar-inverse" >
        <div class="container">
            <a class="navbar-brand" href="/storypub.dev">
                StoryPub
            </a>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/storypub.dev/app/controllers/home">Home</a></li>
                    <li class="dropdown"><a href="/storypub.dev/app/controllers/dashboard">Dashboard</a></li>
                </ul>
             
                    <?php if($this->page=="Home")
                        {
                        echo('<ul class="nav navbar-nav navbar-right">
                              <li><a href="/storypub.dev/app/controllers/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                              <li><a href="/storypub.dev/app/controllers/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                              </ul>');
                        }
                    ?>
            
                    <?php if($this->page=="Login")
                        {
                        echo('<ul class="nav navbar-nav navbar-right">
                              <li><a href="/storypub.dev/app/controllers/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                              </ul>');
                        }
                    ?>
            
                    <?php if($this->page=="Register")
                        {
                        echo('<ul class="nav navbar-nav navbar-right">
                              <li><a href="/storypub.dev/app/controllers/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                              </ul>');
                        }
                    ?>
        </div>
   </nav>

