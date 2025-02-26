<div class="sidebar">
    <ul class="sidebar--items">

        <li>
            <a href="home">
                <span class="icon icon-1"><i class='bx bxs-calendar-check'></i></span>
                <span class="sidebar--item">Take Attendance</span>
            </a>
        </li>
        <li>
            <a href="view-attendance">
                <span class="icon icon-1"><i class='bx bxs-book-alt'></i></span>
                <span class="sidebar--item" style="white-space: nowrap;">View Attendance</span>
            </a>
        </li>
        <li>
            <a href="view-employees">
                <span class="icon icon-1"><i class='bx bxs-group'></i></span>
                <span class="sidebar--item">Employees</span>
            </a>
        </li>
        <li>
            <a href="download-record">
                <span class="icon icon-1"><i class='bx bxs-download'></i></span>
                <span class="sidebar--item">Download Attendance</span>
            </a>
        </li>

    </ul>
    <ul class="sidebar--bottom-items">
        <li>
            <a href="logout">
                <span class="icon icon-2"><i class='bx bxs-trash-alt'></i></span>
                <span class="sidebar--item">Logout</span>
            </a>
        </li>
    </ul>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var currentUrl = window.location.href;
        var links = document.querySelectorAll('.sidebar a');
        links.forEach(function (link) {
            if (link.href === currentUrl) {
                link.id = 'active--link';
            }
        });
    });
</script>