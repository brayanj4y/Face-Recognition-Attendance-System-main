<div class="sidebar">
    <ul class="sidebar--items">
        <li>
            <a href="home">
                <span class="icon icon-1"><i class='bx bxs-dashboard'></i></span>
                <span class="sidebar--item">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="manage-role">
                <span class="icon icon-1"><i class='bx bxs-user-badge'></i></span>
                <span class="sidebar--item">Manage Roles</span>
            </a>
        </li>
        <li>
            <a href="create-workspace">
                <span class="icon icon-1"><i class='bx bxs-business'></i></span>
                <span class="sidebar--item" style="white-space: nowrap;">Create Workspaces</span>
            </a>
        </li>
        <li>
            <a href="managers">
                <span class="icon icon-1"><i class='bx bxs-user-detail'></i></span>
                <span class="sidebar--item">Managers</span>
            </a>
        </li>
        <li>
            <a href="manage-employees">
                <span class="icon icon-1"><i class='bx bxs-group'></i></span>
                <span class="sidebar--item">Manage Employees</span>
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