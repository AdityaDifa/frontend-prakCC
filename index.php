<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Database Gudang Buku</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <main>
        <div class="login-container border">
            <form action="auth/authentication.php" method="POST">
                <div class="content-login">
                    <div class="form-field">
                        <h2 class="form-field">Login Page</h2>
                    </div>
                    <div class="form-field" style="flex-direction: column;">
                        <div style="margin: 20px;">
                            <label for="username">Username: </label>
                            <input type="text" id="username" name="username" required placeholder="username"
                                class="input-1" />
                        </div>
                        <div style="margin: 20px;">
                            <label for="password">password: </label>
                            <input type="password" id="password" name="password" required placeholder="password"
                                class="input-1" />
                        </div>
                    </div>
                    <div>
                        <div class="form-field">
                            <button type="submit" class=" button-13">Login</button>
                        </div>
                        <div>
                            <a href="#" style="margin-top: 5px;color: black;font-size: 13px;">
                                <p>Register Disini</p>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>