<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); exit(); }

//define page title
$title = 'Members Page';

//include header template
require('layout/header.php'); 
?>

<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

				<h2>HAL_Project - Welcome <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES); ?></h2>
				<p><a href='logout.php'>Logout</a></p>
				<hr>
		</div>
	</div>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="input-group" id="adv-search">
                <input id="title" type="text" class="form-control" placeholder="Search for documents" />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label for="contain">Author (Last name)</label>
                                        <input type="text" class="form-control" name="author" id="author">
                                    </div>
                                    <div class="form-group">
                                        <input type="radio" name="auteur" value="0" checked> Author
                                        <input type="radio" name="auteur" value="-1" > Co-author
                                    </div>
                                    <div class="form-group">
                                        <label for="contain">ISBN</label>
                                        <input class="form-control" type="text" name="isbn" id="isbn"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="contain">Keyword</label>
                                        <input class="form-control" type="text" name="keyword" id="keyword"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="contain">Language</label>
                                        <input class="form-control" type="text" name="language" id="language"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="contain">Laboratory</label>
                                        <input class="form-control" type="text" name="laboratory" id="laboratory"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="contain">University</label>
                                        <input class="form-control" type="text" name="university" id="university"/>
                                    </div>
<!--                                    <button id="submit" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>-->
                                </form>
                            </div>
                        </div>
                        <button id="submit" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div id="response">
    </div>
</div>

<?php 
//include header template
require('layout/footer.php'); 
?>
