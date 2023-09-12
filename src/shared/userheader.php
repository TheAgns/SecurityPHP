<header>
    <nav>
        <div>
            <h3>SECURITY PHP</h3>
            <ul class="menu-main">
                <li><a href="/securityphp">HOME</a></li>
                <li><a href="/securityphp/products">PRODUCTS</a></li>
                <li><a href="a">CART</a></li>
                <li><a href="a">PROFILE</a></li>
            </ul>
        </div>
        <ul class="menu-member">
            <?php
            if (Session::exists('username')) {
                ?>
                <li><a href="a">
                        <?php echo Session::get('username'); ?>
                    </a></li>
                <li><a href="/securityphp/logout" class="header-login-a">LOGOUT</a></li>
                <?php
            } else {
                ?>
                <li><a href="a">SIGN UP</a></li>
                <li><a href="a" class="header-login-a">LOGIN</a></li>
                <?php
            }
            ?>
        </ul>
    </nav>
</header>