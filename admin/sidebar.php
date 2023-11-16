<style>
    .selected {
    background-color: #7ba8e9;
    color: white;
    font-weight: bold;
    }
    .nav-link {
        transition: transform 0.2s; /* Add a transition for the transform property */
    }

    .nav-link:hover {
        background-color: #f4f4f4;
        color: #000;
        font-weight: bold;
        transform: translateX(5px); /* Move the text 5px to the right on hover */
    }
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link selected" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="repository.php">Repository</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="user.php">User</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logs.php">Logs</a>
        </li>
    </ul>
</aside>


<script>
$(document).ready(function() {
  // Get the current URL
  var url = window.location.href;

  // Iterate through each sidebar link and compare with the URL
  $('.nav-link').each(function() {
    if (url.includes($(this).attr('href'))) {
      $(this).addClass('selected');
    }else{
      $(this).removeClass('selected');
    }
  });
});
</script>