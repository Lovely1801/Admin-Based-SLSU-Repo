<style>
    .main{
        background: linear-gradient(161deg, #b316fd, #587ada);
    }
    .form, .search-button, .search-input{
        border: none;
        background: none;
        color: #333;
    }
    .search-input{
        outline: none;
    }
    .font-color{
        color: white;
        font-weight: bold;
    }
</style>

<div class="main d-flex justify-content-between align-items-center p-3">
    <div class="items">
        <a href="index.php" class='d-flex justify-content-between align-items-center'>
            <img src="https://cdn-icons-png.flaticon.com/512/3767/3767094.png" width='40' height='40'>&nbsp&nbsp
            <span class='font-color'>SLSU Repo</span>
        </a>
    </div>
    <div class="items">
        <div class="dropdown">
            <a href="#" role='button' data-bs-toggle='dropdown'>
                <span><i class='fa fa-bars fs-4 text-light'></i></span>
            </a>
            <ul class="dropdown-menu align-items-center">
                <li class="dropdown-item"><a href="profile.php">Profile</a></li>
                <li class="dropdown-item"><a href="user_logs.php">Logs</a></li>
                <li class="dropdown-item"><a href="logout.php">Logout</a></li>

            </ul>
        </div>
    </div>
</div>
