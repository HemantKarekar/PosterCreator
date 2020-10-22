<header>
    <nav class="navbar">
        <div class="brand">
            <a href="index.php"><img src="assets/images/logo-wr.png" alt=""></a>
        </div>
        <div class="nav-wrap">
            <ul>
                <?php
                error_reporting(0);
                if ($_SESSION["name"]=="Admin") {
                    echo "<li class='nav-link'><a href='admin.php'>Dashboard</a></li>";
                }
                else{
                    echo "<li class='nav-link'><a href='profile.php?id=".$_SESSION["name"]."'>".$_SESSION["name"]."</a></li>";
                }
                ?>
                <li class="nav-link" style="background: #ff4040;"><a href="logout.php">Sign Out</a></li>
            </ul>
        </div>
    </nav>
</header>