<section class="header">
    <div class="logo">
        <span class="logomark"><i class='bx bx-calendar'></i></span>
        <h4>FaceSync</h4>
    </div>
    <div class="search--notification--profile">
        <div id="searchInput" class="search">
            <input type="text" id="searchText" placeholder="Search .....">
            <button onclick="searchItems()"><i class='bx bx-search'></i></button>
        </div>
        <div class="notification--profile">
            <div class="picon lock">
                @ <?php echo user()->name ?>
            </div>

            <div class="picon profile">
                <img src="resources/images/user.jpeg" alt="">
            </div>
        </div>
    </div>
</section>
<script>
    function searchItems() {
        var input = document.getElementById('searchText').value.toLowerCase();
        var rows = document.querySelectorAll('table tr');

        rows.forEach(function (row) {
            var cells = row.querySelectorAll('td');
            var found = false;

            cells.forEach(function (cell) {
                if (cell.innerText.toLowerCase().includes(input)) {
                    found = true;
                }
            });

            if (found) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>